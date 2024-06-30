<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    

  /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $paniers=Panier::where('user_id',Auth::user()->id)->get();
      $prixTotal = 0;
      foreach ($paniers as $key => $value) {
        $prixTotal += $value->product->price;
      }
      return view('panier.index',compact('paniers','prixTotal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Product $product)
    {
      $newPanier = new Panier();
      $newPanier->user_id = Auth::user()->id;
      $newPanier->product_id = $product->id;
      $newPanier->save();
      return redirect()->route('panier.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panier $panier)
    {
        $panier->delete();
        return redirect()->route('panier.index');
      }
      
      public function destroyAll(){
        Panier::query()->delete();
        return redirect()->route('panier.index');
    }
}
