<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('id', '>', 0)->paginate(5);


        return view('user.blog', compact('posts'));
    }
}
