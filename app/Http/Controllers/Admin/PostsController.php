<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Categories;
use App\Tags;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        $posts = Posts::latest()->paginate(6);

        return view('admin.posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $tags = Tags::all();

        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Posts();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->thumbnail = $request->input('filepath');
        $post->slug = $request->input('slug');
        $post->tag_id = $request->input('tag_id');
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->route('admin.posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $categories = Categories::all();
        $tags = Tags::all();
        $post = Posts::where('slug', $name)
            ->firstOrFail();

        return view('admin.posts.post', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->thumbnail = $request->input('filepath');
        $post->slug = $request->input('slug');
        $post->tag_id = $request->input('tag_id');
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->route('admin.posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::FindOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts');
    }
}
