<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Log;

class PostController extends Controller
{

    public function create()
    {
        $user_id = Auth::id();
        return view('post.post_form', compact('user_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $data = $request->all();



        // Dodaj user_id za autora posta
        $data['user_id'] = Auth::id();

        Post::create($data);

        return redirect(url('/home'));
    }
    public function destroy($id)
    {
        //Preuzmite post prema ID-u
        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);

        //Izbriši post
        $post->delete();
        //Redirekcija sa porukom o uspehu
        return redirect()->route('home')->with('success', "Post deleted successfully.");
    }

    public function index()
    {
        // Preuzmi sve postove
        $posts = Post::all();

        // Vrati prikaz sa svim postovima
        return view('post.guest', compact('posts'));
    }

    public function show(Post $post)
    {

        return view('post.show', compact('post'));

    }
    public function edit($id)
    {

        $post = Post::findOrFail($id);

        // // Pripremite log poruku
        // $logMessage = 'User ID: ' . Auth::id() . ', Post User ID: ' . $post->user_id . ', Post ID: ' . $post->id . PHP_EOL;
        // // Putanja do .txt fajla na Desktopu
        // $filePath = 'C:\\Users\\Petar\\Desktop\\log.txt';
        // // Snimanje log poruke u fajl
        // file_put_contents($filePath, $logMessage, FILE_APPEND);

        // Authorize the update action
        $this->authorize('update', $post);

        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');


        $post->update();

        return redirect()->route('home')->with('success', "Post updated successfully.");

    }

}
