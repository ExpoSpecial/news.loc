<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;

class HomeController extends Controller
{
    public function index() {
        $posts = Posts::all();

        return view('frontend.home', [
            'posts' => $posts
        ]);
    }
}
