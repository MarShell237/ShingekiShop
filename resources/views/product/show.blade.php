@php
    $isOn = $product->note;
@endphp


@extends('base')
@vite(['resources/css/show.css','resources/css/star.css','resources/css/partials/input.css','resources/css/partials/select.css'])
@vite(['resources/js/star.js'])
@section('title',$product->getSlug())

@section('content')
    <section>
        <div class="layout-description">
            <div class="left">
                {{-- <img src="{{$product->imageUrl()}}" alt=""> --}}
                <img src="{{$product->image}}" alt="">
            </div>
            <div class="right">
                <div class="right-up">
                    <h2>{{$product->name}}</h2>
                    <div class="note">
                        <div class="stars">
                            <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                            <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                            <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                            <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                            <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                        </div>
                        <p class="note-produit">{{$product->note}}\5</p>
                        <p>{{$product->nb_vote}} avis</p>
                    </div>
                    <p class="product-decription">
                        {!! $product->description !!}
                    </p>
                </div>
                <div class="right-down">
                    <h3>Donnez votre avis</h3>
                    <div class="stars">
                        <div class="star-2"></div>
                        <div class="star-2"></div>
                        <div class="star-2"></div>
                        <div class="star-2"></div>
                        <div class="star-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-layouts">
            <div class="layout-price">
                <p class="price">{{$product->getPrice()}} fcfa</p>
                <div class="quatites">
                    <form action="">
                      <label for="quantite"  class="label">Quantites:</label>
                        @include('partials._input',['type'=>'number','name'=>'quantite','placeholder'=>'entrer le nombre d\'articles que vous desirez','value'=>1])
                    </form>
                </div>
              <div class="btn-action">
                  <form action="{{route('panier.store',$product)}}" method="POST" style="margin:0;">
                    @csrf
                    <button>
                      <span >Ajouter au panier</span>
                      <i class="fa fa-cart-shopping"></i>
                    </button>
                  </form>
                  <div>
                    <label for="checkbox-show" ><i class="fa fa-heart fa-heart-show" id="fa-heart-show"></i></label>
                    <input type="checkbox-show" name="" id="checkbox-show">
                  </div>
                </div>
            </div>
            <div class="layout-information-livraison">
                <h3>Informations de livraison</h3>
                <span class="label">Numero de telephone:</span>
                @auth
                  <p class="phone">{{Auth::user()->phone}}</p>
                @endauth
                @guest
                  <p class="phone">Vous devez etre connecter</p>
                @endguest
                <form action="">
                  <label for="ville_id"  class="label">Adresse de livraison:</label>
                    @include('partials._select',['name'=>'villes_id','value'=> '','categories'=>$villes])
                </form>
            </div>
        </div>
    </section>
    <section>
        <h2>Produits similaires</h2>
        <div class="others-products">
            @forelse ($products as $product)
              <card :valeur="{{$product}}" slug="{{$product->getSlug()}}"></card>
            @empty
                <h2>Aucun {{$filter_title}} Pour L'instant</h2>
            @endforelse
        </div>
    </section>
@endsection