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
        try {
            $user = new User();
            $user->username = $request->username;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->full_name = $request->full_name;
            $user->role = $request->role;
            $user->phone_number = $request->phone_number;

            if ($request->hasFile('profile_picture')) {
                if ($user->profile_picture) {
                    $user->profile_picture = null;
                }

                $image = $request->file('profile_picture');
                $imageData = file_get_contents($image->getRealPath());
                $user->profile_picture = $imageData;

            } else {
                $user->profile_picture = $user->profile_picture;
            }

            $user->save();
            return redirect('/user')->with('success', 'User berhasil disimpan!');

        } catch (\Exception $e) {
            return redirect('/user/create')->with('error', 'User gagal disimpan. Coba lagi!');
        }
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id){
        try {
            $user = User::findOrFail($id);
    
            $validated = $request->validate([
                'username' => 'required|max:50',
                'email' => 'required|email|max:100',
                'full_name' => 'required|max:100',
                'phone_number' => 'required|max:20',
                'role' => 'required|in:customer,admin',
                'profile_picture' => 'nullable|image|max:2048', 
            ]);
    
            $user->username = $request->username;
            $user->email = $request->email;
            $user->full_name = $request->full_name;
            $user->phone_number = $request->phone_number;
            $user->role = $request->role;
    
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password); 
            }
    
            if ($request->hasFile('profile_picture')) {
                $image = $request->file('profile_picture');
                $imageData = file_get_contents($image->getRealPath());
                $user->profile_picture = $imageData;
            }
    
            $user->save();
    
            return redirect('/user')->with('success', 'User berhasil diubah!');
    
        } catch (\Exception $e) {
            \Log::error("Error updating user: " . $e->getMessage());
    
            return redirect('/user/edit/' . $id)->with('error', 'User gagal diubah. Coba lagi!');
        }
    }    

    public function destroy($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/user')->with('success', 'User berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('/user')->with('error', 'User gagal dihapus. Coba lagi!');
        }
    }
}
