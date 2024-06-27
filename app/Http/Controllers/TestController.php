<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Ville;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        dd("Sssssssssss");
        return Product::paginate(4);
    }

    public function show(string $id){
        $product = Product::findOrFail($id);
        return view("product.show",[
            "product"=>$product,
            'categories'=>Categorie::all(),
            'villes'=>Ville::all(),
            'products'=>Product::where('categories_id',$product->categories_id)->limit(4)->get(),
            'filter_title'=>Categorie::findOrFail($product->categories_id)->name,
        ]);
    }
}
