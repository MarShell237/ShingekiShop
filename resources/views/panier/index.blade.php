    {{-- @vite(['resources/css/panier.css']) --}}
    @vite(['resources/css/partials/input.css','resources/css/partials/select.css'])
@extends('base')
@section('content')
      <h1 style="font-size: 90px;color:gold;margin-bottom:0;margin-top: 100px">Pannier</h1>
      @forelse ($paniers as $panier )
        @include('partials._panier',['panier'=>$panier])
      @empty
        <p style="font-size: 70px;text-align:center;">Votre panier est vide</p>
      @endforelse

      <hr>
      <h2 style="font-size: 50px">Sommaire</h2>
          <div class="col" style="font-size:30px">Nombre de produit: <span style="color: gold">{{count($paniers)}}</span> produit(s) dans le panier</div>                    
          <div style="font-size: 30px;padding-top:10px;text-decoration:underline;">Prix Total: </div>
          <div class="col text-right" style="color: gold;font-size:80px;"> {{number_format($prixTotal,0,' ','.')}} FCFA </div>                  
          <a href="{{route('facture.store')}}"><button class="btn" style="background-color:#32A2E1;padding:15px;font-size:20px;color:white;border-width:0;border-radius:10px;margin:0 20px 0 0">Commander</button></a>
          <a href="{{route('panier.destroyAll')}}"><button style="background-color:crimson;padding:15px;font-size:20px;color:white;border-width:0;border-radius:10px;">Supprimer le panier</button></a>
      </div>
@endsection
