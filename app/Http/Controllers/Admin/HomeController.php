<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return view('home');

        if (Auth::user()->role == 1) {
            return view('admin.home');
        }
      
        return redirect('/')->with('success', 'ko có quyen admin');

    }
    public function viewCate()
    {
        return view('admin.category.index');
    }
}
