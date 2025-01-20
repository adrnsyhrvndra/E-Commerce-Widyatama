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
        try {

            $request->validate([
                'brand_name' => 'required|string|max:255|min:3|unique:brands',
                'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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

        } catch (\Exception $e) {

            return redirect('/brand/create')->with('error', 'Data brand gagal disimpan. Coba lagi!');

        }
    }

    // public function store(Request $request)
    // {
    //     try {
    //         // Validate the inputs
    //         $request->validate([
    //             'brand_name' => 'required|string|max:255|min:3|unique:brands',
    //             'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10000',
    //         ]);

    //         // Create a new Brand instance
    //         $brand = new Brand;
    //         $brand->brand_name = $request->brand_name;

    //         // Handle the file upload
    //         if ($request->hasFile('brand_logo')) {
    //             // Get the uploaded file
    //             $image = $request->file('brand_logo');

    //             // Generate a unique filename
    //             $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

    //             // Move the file to the public/images directory
    //             $image->move(public_path('images'), $fileName);

    //             // Store the file URL in the database
    //             $brand->brand_logo = url('images/' . $fileName);
    //         }

    //         // Set timestamps and save the record
    //         $brand->created_at = now();
    //         $brand->updated_at = now();
    //         $brand->save();

    //         // Redirect with success message
    //         return redirect('/brand')->with('success', 'Data brand berhasil ditambahkan');
    //     } catch (\Exception $e) {
    //         // Redirect with error message in case of failure
    //         return redirect('/brand/create')->with('error', 'Data brand gagal disimpan. Coba lagi!');
    //     }
    // }

    public function edit($brand_id){
        $brand = Brand::findOrFail($brand_id);
        return view('brands/edit', compact('brand'));
    }

    public function update(Request $request, $brand_id){
        try {
            $request->validate([
                'brand_name' => 'required|string|max:255|min:3|unique:brands,brand_name,' . $brand_id,
                'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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

            return redirect('/brand')->with('success', 'Data brand berhasil diubah');
        } catch (\Exception $e) {
            return redirect('/brand/edit')->with('error', 'Data brand gagal disimpan. Coba lagi!');
        }
    }

    public function destroy($brand_id){

        try {
            Brand::where('brand_id', $brand_id)->delete();
            return redirect('/brand')->with('success', 'Data brand berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/brand')->with('error', 'Data brand gagal dihapus. Coba lagi!');
        }

    }
}
