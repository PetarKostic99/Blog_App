<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::findOrFail($request->post_id);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'post_id' => $post->id,

        ]);
        return redirect()->back();

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Trazi id komentara
        $comment = Comment::find($id);
        $this->authorize('delete', $comment);
        $comment->delete();
        // // Da li postoji komentar
        // if (!$comment) {
        //     return redirect()->back()->with('error', 'Comment not found.');
        // }

        // // Proverava se da li je prijavljeni korisnik vlasnik komentara ili posta
        // if (
        //     Auth::id() === $comment->user_id ||
        //     (isset($comment->post) && Auth::id() === $comment->post->user_id) ||
        //     Auth::user()->role === 'admin' // Provera da li je korisnik admin
        // ) {
        //    
        //     return redirect()->back()->with('success', 'Comment deleted successfully.');
        // }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }



    public function comments()
    {
        $comments = Comment::all();
        return view('admin.comments', compact('comments'));

    }
}
