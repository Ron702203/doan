<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request, $id)
    {
        $quantity = request()->input('quantity', 1);
        $product = Product::find($id);

        $cart = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            $cart->increment('quantity', $quantity);
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function showCart()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });
        $user_id = Auth::user()->id;

        $user = User::find($user_id);


        return view('client.cart', compact('carts', 'total', 'user'));
    }


    public function destroy(string $id)
    {

        $cart = Cart::destroy($id);



        // $message = "Seccess full deleted";
        // if (!Cart::destroy($id)) {
        //     $message = "Seccess full failed";
        // }

        return redirect()->back()->with('success', 'Seccess full deleted');
    }

    public function update(Request $request)
    {
        $cart = Cart::find($request->id);

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart not found');
        }

        $quantity = $request->quantity;
        $cart->quantity = $quantity;
        $cart->save();

        session()->flash('success', 'Cart successfully updated!');
    }
    public function checkout(Request $request)
    {



        if ($request->total) {
            $order = new Order();
            $user = Auth::user();
            $order->user_id = $user->id;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $codeRandom = Str::random(11);
            $order->code = $codeRandom;
            $order->status = 1;
            $order->payment_method = 1;
            $order->save();


            $cart = Cart::where('user_id', $user->id)->get();
            foreach ($cart as $carts) {
                $orderdetail = new OrderItem();
                $orderdetail->order_id = $order->id;
                $orderdetail->product_id = $carts->product_id;
                $orderdetail->save();
            }


            return redirect()->back()->with('success', ' Thanh toán thành công');
        }
    }
    public function vnpay(Request $request)
    {

        $codeRandom = Str::random(11);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/";
        $vnp_TmnCode = "QYYQKXRC"; //Mã website tại VNPAY 
        $vnp_HashSecret = "XUOXTURWCEIGADAVLXSTAJOIZQRHPSMI"; //Chuỗi bí mật

        $vnp_TxnRef = $codeRandom; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Gấu bông online";
        $vnp_OrderType = "thanh toán hóa đơn";
        $vnp_Amount = $request->total * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
}
