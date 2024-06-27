<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    

  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        session_start();
        \Session::put('Users_id',\Session::get('Users_id'));
        \Session::put('Users_name','mysterio');
        $products=panier::where('Users_id',\Session::get('Users_id'))->get();

        return view('panier.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $prod=Product::findOrFail($request->id);
        // dd($prod);
        $newpanierproduct=new Panier();
        $newpanierproduct->prix=$prod->price;
        $newpanierproduct->nb_produit=$prod->price;
        $newpanierproduct->name_product=$prod->name;
        $newpanierproduct->image=$prod->image;
        $newpanierproduct->users_id=\Session::get('Users_id');
        $newpanierproduct->save();
        // return redirect()->route('panier.index');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Panier $panier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panier $panier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $panierdelete=Panier::where("Users_id",\Session::get('Users_id'));
        $panierdelete->delete();
        return redirect()->route('panier.index');
    }
}
