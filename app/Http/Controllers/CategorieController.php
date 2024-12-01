<?php

namespace App\Http\Controllers;

use App\Models\Categorie; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller{

    public function index(){
        $categorie = Categorie::all();
        return view('categories/index', compact('categorie'));
    }

    public function create(){
        return view('categories/create');
    }

    public function store(Request $request){

        $request->validate([
            'category_name' => 'required|string|max:255|min:3|unique:categories',
        ]);

        $categorie = new Categorie;
        $categorie->category_name = $request->category_name;
        $categorie->created_at = now();
        $categorie->updated_at = now();

        $categorie->save();

        return redirect('/categorie/create')->with('success', 'Data categorie berhasil ditambahkan');

    }

    public function edit($category_id){
        $categorie = Categorie::findOrFail($category_id);
        return view('categories/edit', compact('categorie'));
    }

    public function update(Request $request, $category_id){

        $request->validate([
            'category_name' => 'required|string|max:255|min:3|unique:categories',
        ]);

        $categorie = Categorie::findOrFail($category_id);
        $categorie->category_name = $request->category_name;
        $categorie->updated_at = now();

        $categorie->save();

        return redirect('/categorie');
    }

    public function destroy($category_id){
        Categorie::where('category_id', $category_id)->delete();
        return redirect('/categorie');
    }

}
