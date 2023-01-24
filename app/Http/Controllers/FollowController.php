<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    public function createFollow(Post $post) {

         $existCheck = Follow::where([['user_id', '=', auth()->user()->id],['followedpost', '=', $post->id]])->count();
        if($existCheck){
            return back()->with('failure', 'Już obserwujesz to ogłoszenie');
        }


        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followedpost = $post->id;
        $newFollow->save();

        return back()->with('success', 'Dodano do obserwowanych');
    }

    public function removeFollow() {

    }
}
