<?php

namespace App\Http\Controllers;

use App\Models\Brand; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller {
 
    public function index(){
        $brand = Brand::all();
        return view('brands/index', compact('brand'));
    }

    public function create(){
        return view('brands/create');
    }

    public function store(Request $request){
        $request->validate([
            'brand_name' => 'required|string|max:255|min:3|unique:brands',
            'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10000',
        ]);

        $brand = new Brand;
        $brand->brand_name = $request->brand_name;

        if ($request->hasFile('brand_logo')) {
            $image = $request->file('brand_logo');
            $imageData = file_get_contents($image->getRealPath());
            $brand->brand_logo = $imageData;
        }

        $brand->created_at = now();
        $brand->updated_at = now();
        $brand->save();

        return redirect('/brand')->with('success', 'Data brand berhasil ditambahkan');
    }

    public function edit($brand_id){
        $brand = Brand::findOrFail($brand_id);
        return view('brands/edit', compact('brand'));
    }

    public function update(Request $request, $brand_id){
        $request->validate([
            'brand_name' => 'required|string|max:255|min:3|unique:brands',
            'brand_logo' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $brand = Brand::findOrFail($brand_id);
        $brand->brand_name = $request->brand_name;

        if ($request->hasFile('brand_logo')) {
            if ($brand->brand_logo) {
                $brand->brand_logo = null;
            }

            $image = $request->file('brand_logo');
            $imageData = file_get_contents($image->getRealPath());
            $brand->brand_logo = $imageData;
        }

        $brand->updated_at = now();
        $brand->save();

        return redirect('/brand');
    }

    public function destroy($brand_id){
        Brand::where('brand_id', $brand_id)->delete();
        return redirect('/brand');
    }
}
