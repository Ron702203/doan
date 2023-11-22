<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categoryList = Category::all();
        return view('admin.category.index', compact('categoryList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'slug' => 'Laravel Livewire CRUD'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.category.create')
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category;
        $category->name = $request->name;
        $category->img = $request->img;
        $category->desc = $request->desc;
        $category->save();

        return redirect()->route('admin.category')->with('success', 'thêm mới thành công');
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

        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $bool = $category->update($request->only(['name', '', 'desc']));
        $message = "Seccess full Updated";
        if (!$bool) {
            $message = "Seccess full failed";
        }
        return redirect()->route('admin.category')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $message = "Seccess full deleted";
        if (!Category::destroy($id)) {
            $message = "Seccess full failed";
        }

        return redirect()->route('admin.category')->with('message', $message);
    }
}
