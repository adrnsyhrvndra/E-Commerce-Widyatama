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
use Illuminate\Support\Facades\DB;

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

        try {
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
                $binaryData = file_get_contents($file->getRealPath());
                $user->profile_picture = $binaryData;
            }

            $user->save();

            Auth::login($user);

            return redirect('/login')->with('success', 'Registrasi berhasil!');
        } catch (\Exception $e) {
            return redirect('/register')->with('error', 'Terjadi kesalahan. Coba lagi!');
        }
    }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required|unique:users',
    //         'password' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'full_name' => 'required',
    //         'phone_number' => 'required',
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //         'password_confirmation' => 'required|same:password',
    //     ]);

    //     try {
    //         $user = new User();
    //         $user->username = $request->username;
    //         $user->password = Hash::make($request->password); // Hash password securely
    //         $user->email = $request->email;
    //         $user->full_name = $request->full_name;
    //         $user->phone_number = $request->phone_number;
    //         $user->role = 'customer';
    //         $user->created_at = now();
    //         $user->updated_at = now();

    //         if ($request->hasFile('profile_picture')) {
    //             // Save the uploaded image to the 'uploads/profile_pictures' folder
    //             $file = $request->file('profile_picture');
    //             $fileName = time() . '_' . $file->getClientOriginalName();
    //             $file->move(public_path('images/profile'), $fileName);

    //             // Store the relative path to the image in the database
    //             $user->profile_picture = 'images/profile/' . $fileName;
    //         }

    //         $user->save();

    //         // Automatically log in the user after registration
    //         Auth::login($user);

    //         return redirect('/login')->with('success', 'Registrasi berhasil!');
    //     } catch (\Exception $e) {
    //         return redirect('/register')->with('error', 'Terjadi kesalahan. Coba lagi!');
    //     }
    // }

    public function showDashboardAdminPage(){
        $sales = DB::table('orders')
            ->select(DB::raw('MONTH(order_date) as month, SUM(total_price) as total_sales'))
            ->where('order_status', 'completed')
            ->groupBy('month')
            ->get();
    
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    
        $salesData = array_fill(0, 12, 0); 
        foreach ($sales as $sale) {
            $salesData[$sale->month - 1] = $sale->total_sales;
        }
    
        $statusCounts = DB::table('orders')
            ->select('order_status', DB::raw('COUNT(*) as total_orders'))
            ->whereIn('order_status', ['completed', 'processing', 'shipped'])
            ->groupBy('order_status')
            ->get();
    
        $statusLabels = $statusCounts->pluck('order_status')->toArray();
        $statusCountsData = $statusCounts->pluck('total_orders')->toArray();
    
        $jumlahOrderCompleted = DB::table('orders')->where('order_status', 'completed')->count();
    
        $jumlahUser = User::count();
        $totalPendapatan = DB::table('orders')->where('order_status', 'completed')->sum('total_price');
        $jumlahOrderPending = DB::table('orders')->where('order_status', 'pending')->count();
        $produkTerjual = DB::table('order_items')->sum('quantity');
    
        return view('dashboard.index', compact(
            'months', 'salesData',
            'statusLabels', 'statusCountsData',
            'jumlahUser', 'totalPendapatan', 'jumlahOrderPending', 'produkTerjual', 'jumlahOrderCompleted'
        ));
    }       

    public function showStorePage (){
        $products = Product::with(['brands', 'categories'])->paginate(10);
        $addresses = Addresses::where('user_id', auth()->user()->user_id)
            ->where('is_primary_address', '1')
            ->first();
        $user = User::with('orders')->find(auth()->user()->user_id);
        $order = null;

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
