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
        $user = User::create($request->only(['name', 'email', 'password', 'address', 'phone']));
        $message = "Seccess full Created";
        if ($user == null) {
            $message = "Seccess full failed";
        }
        return redirect()->route('admin.user')->with('message', $message);
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
