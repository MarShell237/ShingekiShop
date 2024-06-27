<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\panier;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
             return view('facture.index');
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
    public function store($id)
    {
        //
        {{$prix=0;$quantiter=0;}}
        $paniers=panier::where('Users_id',$id)->get();
        $factures=new Facture();
        {{foreach($paniers as $panier ){
        $prix+=$panier->prix;
        $quantiter++;
        }}}
        
        $factures->prix_vente=$prix;
        $factures->name_product=$paniers[0]->name_product;
        $factures->quantite=count($paniers);
        $factures->Panier_id=$id;
        $factures->nom_acheteur=\Session::get('Users_name');
        $factures->save();
        $facturess=Facture::all();
        return view('facture.index',compact('facturess','paniers','prix','quantiter'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        //
    }
}
