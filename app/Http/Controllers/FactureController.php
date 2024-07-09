<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\panier;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $prixTotal=0;
        $quantiteTotal=0;
        $user = Auth::user();
        $paniers=Panier::where('user_id',$user->id)->get();
        $factures = [];

        foreach($paniers as $panier ){
          $facture=new Facture();
          $facture->user_id = $user->id;
          $facture->panier_id = $panier->id;
          $prixTotal += $facture->panier->product->price * $facture->panier->quantite;
          $quantiteTotal += $facture->panier->quantite;
          $factures[] = $facture;
        }
        $villes = Ville::orderBy('id')->get();
        return view('facture.index',compact('villes','factures','prixTotal','quantiteTotal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {

        
        // $factures->prix_vente=$prix;
        // $factures->name_product=$paniers[0]->name_product;
        // $factures->quantite=count($paniers);
        // $factures->Panier_id=$id;
        // $factures->nom_acheteur=\Session::get('Users_name');
        // $factures->save();
        // $factures=Facture::all();
        
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
