<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //

        $categoryList = Category::all();
        $productList = Product::all();
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


        return view('client.home', compact('catehot', 'producthot', 'cateteddy', 'productteddy', 'catebst', 'productbst', 'catebstnhimbong', 'productbstnhimbong', 'categautruc', 'productgautruc', 'categoryList', 'productList'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $productList = Product::where('name', 'like', "%$query%")->get();

        return view('client.search', compact('productList', 'query'));
    }

    public function sendEmail(Request $request)
    {

        
        $data =[
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];
        Mail::send('admin.emails.sendMail', compact('data'), function($email) {
        $email->to('quangln.htra.291103@gmail.com', 'Nhật Quang');
        });

        return redirect()->back()->with('success', 'Cảm ơn bạn đã đóng góp ý kiến');
        
    }

     public function viewMail()
    {
        return view('emails.contact');
    }
}
