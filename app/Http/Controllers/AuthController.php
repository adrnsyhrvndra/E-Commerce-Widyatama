<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Addresses;
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

        return back()->with('error', 'Username atau Password Salah!');
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
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', 
            'password_confirmation' => 'required|same:password',
        ]);
    
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->full_name = $request->full_name;
        $user->phone_number = $request->phone_number;
        $user->role = 'customer';
        $user->created_at = now();
        $user->updated_at = now();
    
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $user->profile_picture = file_get_contents($file->getRealPath());
        }
    
        $user->save();
    
        Auth::login($user);
    
        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    public function showDashboardAdminPage (){
        return view('dashboard/index');
    }

    public function showStorePage (){
        $products = Product::with(['brands', 'categories'])->paginate(10);
        $addresses = Addresses::where('user_id', auth()->user()->user_id)
            ->where('is_primary_address', '1')
            ->first();
        $user = User::with('orders')->find(auth()->user()->user_id);
        $order = null;

        // Jika ada data order lebih dari satu sesuai auth user, maka ambil data order pertamanya
        if ($user->orders->count() > 0) {
            $order = $user->orders->first();
        } 

        return view('store/index', compact('products', 'addresses', 'order'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Logout berhasil');
    }
}
