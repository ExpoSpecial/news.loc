<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Categories;
use App\Tags;

class AdminHomeController extends Controller
{
    public function show() {
        $posts = Posts::all();
        $categories = Categories::all();
        $tags = Tags::all();
        $postsCount = count($posts);
        $tagsCount = count($tags);
        $categoriesCount = count($categories);


        return view('admin.home', [
            'postCount' => $postsCount,
            'categoriesCount' => $categoriesCount,
            'tagsCount' => $tagsCount
        ]);
    }
}
