@extends('base')
@vite(['resources/css/style.css','resources/css/all.min.css'])
@vite(['resources/js/app.js','resources/js/responsive-navbar.js',])
@section('title','Shingeki Shop - panier')
@section('content')
    <main>
      <h1 style="font-size: 90px;color:gold;margin-bottom:0;margin-top: 100px">Pannier</h1>
      @forelse ($paniers as $panier )
        {{-- @include('partials._panier',['panier'=>$panier]) --}}
        <panier :panier="{{ $panier }}" :villes="{{ $villes }}"></panier>
      @empty
        <p style="font-size: 70px;text-align:center;">Votre panier est vide</p>
      @endforelse
      <index></index>
    </main>
@endsection