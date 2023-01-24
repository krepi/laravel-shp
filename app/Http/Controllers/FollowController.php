<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function createFollow() {
        //you cannot follow yours posts

        //you cannot follow post you're already following
    }

    public function removeFollow() {

    }
}
