<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;

class HomeController extends Controller
{
    public function index() {
        $posts = Posts::all();

        return view('layouts.frontend');
    }
    public function listsMy() {
        $posts = Posts::all();

        return response()->json($posts);
    }
}
