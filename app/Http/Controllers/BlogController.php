<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //
        $blogList = Blog::all();

        return view('client.blog', compact('blogList'));

    }
    public function show(string $id)
    {
        $blogList = Blog::findOrFail($id);
        return view('client.blog_detail', ['blog' => $blogList]);

    }
}
