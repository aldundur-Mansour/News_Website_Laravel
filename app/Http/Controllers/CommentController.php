<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Routing\ControllerMiddlewareOptions
     */
    public function __construct()
    {
        return $this->middleware('auth')->except(['index','show','store']);
    }


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'content' => 'required',
        ]);

        Comment::create($request->all());

        return redirect()->route('posts.show', $request->post_id)
            ->with('success', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'is_approved' => 'required'
        ]);

        $comment->update($request->all());

        return redirect()->route('posts.show',$comment->post_id)
            ->with('success', 'Updated updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        $comment-> delete() ;
        return redirect()->route('posts.show',$comment->post_id)
            ->with('success', 'Comment deleted successfully.');
    }
}
