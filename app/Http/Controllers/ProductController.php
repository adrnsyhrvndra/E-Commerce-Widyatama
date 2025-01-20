<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categorie;

class ProductController extends Controller {
    public function index(){
        $product = Product::with(['brands', 'categories'])->get();
        return view('products/index', compact('product'));
    }

    public function create(){
        $brands = Brand::all();
        $categories = Categorie::all();
        return view('products/create', compact('brands', 'categories'));
    }

    public function store(Request $request){
        try {
            $request->validate([
                'category_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $product = new Product;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;

            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $binaryData = file_get_contents($file->getRealPath());
                $product->product_image = $binaryData;
            }

            $product->save();

            return redirect('/product')->with('success', 'Product berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect('/product/create')->with('error', 'Product gagal ditambahkan. Coba lagi!');
        }
    }

    // public function store(Request $request)
    // {
    //     try {
    //         // Validate the request
    //         $request->validate([
    //             'category_id' => 'required',
    //             'brand_id' => 'required',
    //             'product_name' => 'required|string|max:255',
    //             'description' => 'required|string',
    //             'price' => 'required|numeric',
    //             'stock' => 'required|integer',
    //             'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         ]);

    //         // Create a new Product instance
    //         $product = new Product;
    //         $product->category_id = $request->category_id;
    //         $product->brand_id = $request->brand_id;
    //         $product->product_name = $request->product_name;
    //         $product->description = $request->description;
    //         $product->price = $request->price;
    //         $product->stock = $request->stock;

    //         // Handle the image upload
    //         if ($request->hasFile('product_image')) {
    //             // Get the uploaded file
    //             $image = $request->file('product_image');

    //             // Generate a unique filename
    //             $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

    //             // Move the file to the public/images directory
    //             $image->move(public_path('images/products'), $fileName);

    //             // Save the file URL in the database
    //             $product->product_image = url('images/products/' . $fileName);
    //         }

    //         // Save the product data
    //         $product->save();

    //         // Redirect with a success message
    //         return redirect('/product')->with('success', 'Product berhasil ditambahkan!');
    //     } catch (\Exception $e) {
    //         // Redirect with an error message in case of failure
    //         return redirect('/product/create')->with('error', 'Product gagal ditambahkan. Coba lagi!');
    //     }
    // }

    public function edit($product_id){
        $product = Product::findOrFail($product_id);
        $brands = Brand::all();
        $categories = Categorie::all();
        return view('products/edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, $product_id){
        try {
            $request->validate([
                'category_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'product_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $product = Product::findOrFail($product_id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->updated_at = now();

            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $binaryData = file_get_contents($file->getRealPath());
                $product->product_image = $binaryData;
            }

            $product->save();

            return redirect('/product')->with('success', 'Product berhasil diubah!');
        } catch (\Exception $e) {
            return redirect('/product/edit')->with('error', 'Product gagal disimpan. Coba lagi!');
        }
    }

    public function destroy($product_id){

        try {
            Product::where('product_id', $product_id)->delete();
            return redirect('/product')->with('success', 'Product berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/product')->with('error', 'Product gagal dihapus. Coba lagi!');
        }

    }
}