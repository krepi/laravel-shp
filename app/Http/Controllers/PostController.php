<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{




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
        return view('single-post',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
