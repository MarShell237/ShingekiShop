<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use App\Models\Ville;
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
      foreach ($paniers as $key => $panier) {
        $prixTotal += $panier->product->price * $panier->quantite;
      }
      $villes=Ville::all();
      return view('panier.index',compact('paniers','prixTotal','villes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Product $product)
    {
      $newPanier = new Panier();
      $newPanier->user_id = Auth::user()->id;
      $newPanier->product_id = $product->id;
      $newPanier->ville_id = Auth::user()->ville_id;
      $newPanier->save();
      return redirect()->route('panier.index');

    }

    public function storeShow(Request $request,Product $product)
    {
      $data=$request->validate([
        'quantite'=>'required|min:1|integer',
        'default_city'=>'required',
      ]);
      $newPanier = new Panier();
      $newPanier->user_id = Auth::user()->id;
      $newPanier->product_id = $product->id;
      $newPanier->quantite = $data['quantite'];
      $newPanier->ville_id = $data['default_city'];
      $newPanier->save();
      return redirect()->route('panier.index');

    }

    public function update(Request $request,Panier $panier){
      $data=$request->validate([
        'quantite'.$panier->id=>'required|min:1|integer',
        'ville_id'=>'required',
      ]);
      $panier->quantite=$data['quantite'.$panier->id];
      $panier->ville_id=$data['ville_id'];
      $panier->save();
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
