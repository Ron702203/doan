<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orderList = Order::all();
        return view('admin.order.index', compact('orderList'));
    }
    public function viewDetail(string $id)
    {
        //
        $findOrder =Order::find($id);
        $orderDetail= OrderItem::where('order_id',$id)->get();

        return view('admin.order.viewDetail',compact('orderDetail','findOrder'));
    }

    public function updateOrder(Request $request){

    


        $orderUpdate = Order::find($request->order_id);
        $orderUpdate->update(['status'=> $request->status]);
        return redirect()->route('admin.order')->with('message', 'cập nhật thành công');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.order.create');
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
        $message = "Deleted successfully";
        if (!Order::destroy($id)) {
            $message = "Delete failed";
        }

        return redirect()->route('admin.Order')->with('message', $message);
    }
}
