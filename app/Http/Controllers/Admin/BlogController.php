<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogList = Blog::all();
        return view('admin.blog.index', compact('blogList'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $blog = Blog::all();
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $fileName);

        $blog = new Blog();
        $blog->image = $fileName;
        $blog->desc = $request->desc;
        $blog->title = $request->title;

        $blog->save();

        $message = "Seccess full Created";
        if ($blog == null) {
            $message = "Seccess full failed";
        }
        return redirect()->route('admin.blog')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $blog = Blog::find($id);

        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (!$request->image) {
            $blog = Blog::findOrFail($id);
            $bool = $blog->update(
                [
                    "title" => $request->title,
                    "image" => $request->oldimg,
                    "desc" => $request->desc,
                ]
            );
            $message = "Seccess full Updated";
            if (!$bool) {
                $message = "Seccess full failed";
            }
            return redirect()->route('admin.blog')->with('message', $message);
        } else {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $fileName);
            $blog = Blog::findOrFail($id);
            $bool = $blog->update(
                [
                    "title" => $request->title,
                    "image" => $fileName,
                    "desc" => $request->title,
                ]
            );
            $message = "Seccess full Updated";
            if (!$bool) {
                $message = "Seccess full failed";
            }
            return redirect()->route('admin.blog')->with('message', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $message = "Success full deleted";
        if (!Blog::destroy($id)) {
            $message = "Success full failed";
        }

        return redirect()->route('admin.blog')->with('message', $message);
    }
}
