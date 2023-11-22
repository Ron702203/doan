<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categoryList = Category::all();



        $catehot = Category::find(1);
        $producthot = Product::where('category_id', $catehot->id)->get();

        $cateteddy = Category::find(2);
        $productteddy = Product::where('category_id', $cateteddy->id)->get();

        $catebst = Category::find(3);
        $productbst = Product::where('category_id', $catebst->id)->get();

        $catebstnhimbong = Category::find(4);
        $productbstnhimbong = Product::where('category_id', $catebstnhimbong->id)->get();

        $categautruc = Category::find(5);
        $productgautruc = Product::where('category_id', $categautruc->id)->get();



        // dd($productList);


        return view('client.home', compact('catehot', 'producthot', 'cateteddy', 'productteddy', 'catebst', 'productbst', 'catebstnhimbong', 'productbstnhimbong', 'categautruc', 'productgautruc', 'categoryList'));
    }
    public function cate_product($id)
    {
        $nameCate = Category::find($id);
        $catepr = Product::where('category_id', $id)->get();

        return view('client.category', compact('catepr', 'nameCate'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('client.product_detail', ['product' => $product]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
