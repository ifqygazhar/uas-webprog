<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'posts' => Post::latest()->filter(request(['search']))->get()
        ]);
    }
    public function showDetail(Post $post)
    {
        $post->sizes = $post->sizes ? json_decode($post->sizes, true) : [];
        return view('detail', [
            'post' => $post,
        ]);
    }
}
