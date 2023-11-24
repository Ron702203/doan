<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userList = User::all();
        return view('admin.user.index', ['userList' => $userList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate(
            [
                'name' => 'required|max:225',
                'email' => 'required|unique:users',
                'password' => 'required',
                'cpassword' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ],
            [
                'name.required' => 'Nhập tên',
                'email.unique' => 'Email đã tồn tại',
                'email.required' => 'Nhập email',
                'password.required' => 'Nhập password',
                'address.required' => 'Nhập address',
                'phone.required' => 'Nhập phone',
                'cpassword.required' => 'Nhập confirm password',
            ]);



         if ($data['password'] == $data['cpassword']) {
            $user = new User();
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->phone = $data['phone'];
            $user->save();
            return redirect()->route('admin.user')->with('success', 'Thêm mới thành công');
         }   
         return redirect()->back()->with('message', 'Không trùng mật khẩu');


       
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
        $message = "Seccess full deleted";
        if (!User::destroy($id)) {
            $message = "Seccess full failed";
        }

        return redirect()->route('admin.user')->with('message', $message);
    }
}
