<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function __construct(){
        $this->middleware(['auth', 'checkRole:admin,user'])->except(['showLoginForm', 'login', 'showRegisterForm', 'register', 'logout', 'showStorePage']);
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            
            if ($user->role == 'admin') {
                Auth::login($user);
                return redirect('/admin');
            } else {
                Auth::login($user);
                return redirect('/');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|email|unique:users',
            'full_name' => 'required',
            'phone_number' => 'required',
            'profile_picture' => 'nullable',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'role' => 'customer',
            'profile_picture' => $request->profile_picture,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $request->file('profile_picture')->store('public/profile_picture');
            $user->save();
        }

        Auth::login($user);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    public function showDashboardAdminPage (){
        return view('dashboard/index');
    }

    public function showStorePage (){
        $products = Product::with(['brands', 'categories'])->get();
        return view('store/index', compact('products'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Logout berhasil');
    }
}
