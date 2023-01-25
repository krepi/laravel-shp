<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Follow;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function search($term){
        $posts = Post::search($term)->get(null, ['*'], 'mongodb');
        $posts->load('user:id,username,avatar');
        return $posts;
    }

    public function update(Post $post, Request $request){
        $incomingFields = $request->validate([
            'brand'=>'required',
            'model'=>'required',
            'mileage'=>'required',
            'fuel'=>'required',
            'body'=>'required',
            'colour'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);
        $images=[];
        $user = auth()->user();
        $img=$request->file();

        if($img){
            foreach($img as $im){
                if($im){
                    $imgData= Image::make( $im)->fit(240)->encode('jpg');
                    $filename= $user->username. '-' .uniqid(). '.jpg';
                    Storage::put('public/post-img/'. $filename, $imgData);
                    $images[]=$filename;
                }
            }
        }
        if(count($images)>0){
            $incomingFields['images']=$images;
            }

        $incomingFields['images']=$images;

        $post->update($incomingFields);
        return redirect("/post/{$post->id}")->with('success', 'Post successfully updated');

    }

    public function showEditForm(Post $post){
        return view('edit-post', ['post' => $post]);
    }

    public function delete(Post $post){

       Post::where('_id', $post->id)->delete();
       return redirect('/profile/'. auth()->user()->username)->with('success', 'Post successfully deleted');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::all();
        return  view('try',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if(!auth()->check()) {
            return redirect('/')->with('failure','first log in ');
        }

            return view('create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'brand'=>'required',
            'model'=>'required',
            'mileage'=>'required',
            'fuel'=>'required',
            'body'=>'required',
            'colour'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);
        $images=[];
        $user = auth()->user();
        $img=$request->file();

        if($img){
            foreach($img as $im){
                if($im){
                    $imgData= Image::make( $im)->fit(240)->encode('jpg');
                    $filename= $user->username. '-' .uniqid(). '.jpg';
                    Storage::put('public/post-img/'. $filename, $imgData);
                    $images[]=$filename;
                }
            }


        }
        if(count($images)>0){
            $fields['images']=$images;
            }

        $fields['user_id']=$user->_id;
        $newPost = Post::create($fields);

        return redirect("/post/{$newPost->id}")->with('success', 'Thank You for creating post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        $currentlyFollowing = 0;

        $user = auth()->user();

        if(auth()->check()){
        $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id],['followedpost', '=', $post->id]])->count();
        }

        return view('single-post',['currentlyFollowing' => $currentlyFollowing, 'post'=>$post]);
    }



}
