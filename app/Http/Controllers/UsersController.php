<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }


    public function store(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->full_name = $request->full_name;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->save();
        return redirect('/');
    }


    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->full_name = $request->full_name;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->save();
        return redirect('/');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/');
    }
}
