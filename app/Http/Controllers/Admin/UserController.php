<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    
    public function index()
    {
        $data['users'] = User::all();
        return view('Admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'role' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|same:confirm_password',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);

        $user->save();
        if ($user) {
            return redirect()->route('users.index')->with('success', 'User Added Successfully!');
        }
        return redirect()->route('users.index')->with('error', 'Failed to Create User!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('Admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'role' => 'required',
            'email' => 'required|unique:users,email,' . $id,
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($user->isDirty()) {
            $user->update();
            return redirect()->route('users.index')->with('success', 'User Updated Successfully!');
        }
        return redirect()->route('users.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('warning', 'User Deleted Successfully');
    }
}
