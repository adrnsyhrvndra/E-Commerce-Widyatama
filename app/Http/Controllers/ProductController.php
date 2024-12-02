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

        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_image = $request->product_image;

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/gambarStorage', $imageName);
            $product->product_image = $imageName;
        }

        $product->save();
        
        return redirect('/product')->with('success', 'Product berhasil ditambahkan!');
    }

    public function edit($product_id){
        $product = Product::findOrFail($product_id);
        $brands = Brand::all();
        $categories = Categorie::all();
        return view('products/edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, $product_id){

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
        $product->product_image = $request->product_image;
        $product->updated_at = now();

        if ($request->hasFile('product_image')) {
            if ($product->product_image) {
                Storage::delete('public/gambarStorage/' . $product->product_image);
            }

            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/gambarStorage', $imageName);
            $product->product_image = $imageName;
        }

        $product->save();

        return redirect('/product');
    }

    public function destroy($product_id){
        Product::where('product_id', $product_id)->delete();
        return redirect('/product');
    }
}
