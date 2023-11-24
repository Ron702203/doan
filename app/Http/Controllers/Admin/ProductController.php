<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productList = Product::all();
        return view('admin.product.index', compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',

            'price' => 'required',
            'category_id' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.product.create')
                ->withErrors($validator)
                ->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->img = $request->img;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->category_id = $request->category_id;


        $product->save();

        return redirect()->route('admin.product')->with('success', 'thêm mới thành công');
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

        $product = Product::find($id);
        $cate = Category::all();

        return view('admin.product.edit', compact('product','cate'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::findOrFail($id);
        $bool = $product->update($request->only(['name', '', 'desc', 'price', 'category_id']));
        $message = "Updated successfully";
        if (!$bool) {
            $message = "Update failed";
        }
        return redirect()->route('admin.product')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $message = "Deleted successfully";
        if (!Product::destroy($id)) {
            $message = "Delete failed";
        }

        return redirect()->route('admin.product')->with('message', $message);
    }
}
