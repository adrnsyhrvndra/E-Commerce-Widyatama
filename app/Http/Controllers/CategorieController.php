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

}
