<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.main', compact('users'));
    }

    public function update(User $user, Request $request)
    {
        $user->update([
            'role' => $request->get('role')
        ]);

        return redirect()->back();
    }

    public function create()
    {
        $user_id = Auth::id();
        return view('admin.post_create', compact('user_id'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $data = $request->only(['title', 'content']);

        $data['user_id'] = Auth::id();
        Post::create($data);

        return redirect(url('/admin'));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }

    public function show(Post $post)
    {

        return view('post.show', compact('post'));

    }
    public function listPosts()
    {
        $posts = Post::all();
        return view('admin.post', compact('posts'));
    }
}
