<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->email = $request->email;
        if($post->save()) {
            return response(['author' => new PostResource($post), 'message' => 'Created successfully'], 201);
        }
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->email = $request->email;
        if($post->save()) 
        {
            return new PostResource($post);
        }
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->delete())
        {
            return new PostResource($post);
        }
    }
}
