<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return CommentResource::collection($comments);
    }
    public function store(Request $request)
    {
        $comments = new Comment();
        $comments->body = $request->body;
        $comments->name = $request->name;
        if($comments->save()) {
            return new CommentResource($comments);
        }
    }
    public function show($id)
    {
        $comments = Comment::findOrFail($id);
        return new CommentResource($comments);
    }
    public function update(Request $request, $id)
    {
        $comments = Comment::findOrFail($id);
        $comments->body = $request->body;
        $comments->name = $request->name;
        if($comments->save()) 
        {
            return new CommentResource($comments);
        }
    }
    public function destroy($id)
    {
        $comments = Comment::findOrFail($id);
        if($comments->delete())
        {
            return new CommentResource('ok');
        }
    }
}
