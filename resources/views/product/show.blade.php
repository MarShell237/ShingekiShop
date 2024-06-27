@php
    $isOn = $product->note;
@endphp


@extends('base')
@vite(['resources/css/show.css','resources/css/partials/input.css','resources/css/partials/select.css','resources/js/star.js','resources/css/stare.css'])
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
                        <div class="stare"></div>
                        <div class="stare"></div>
                        <div class="stare"></div>
                        <div class="stare"></div>
                        <div class="stare"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-layouts">
            <div class="layout-price">
                <p class="price">{{$product->price}} fcfa</p>
                <div class="quatites">
                    <form action="">
                        {{-- @include('partials._input',['type'=>'number','label'=>'Quantites:','name'=>'quantite','placeholder'=>'entrer le nombre d\'articles que vous desirez','value'=>1]) --}}
                    </form>
                </div>
                <button>
                    {{method_field('POST')}}
                    <a href="{{route('panier.store',$product->id)}}">
                        <span>Ajouter au panier</span>
                    </a>
                    <i class="fa fa-cart-shopping"></i>
                </button>
            </div>
            <div class="layout-information-livraison">
                <h3>informations de livraison</h3>
                <span>Numero de telephone:</span>
                <p>a remplir</p>
                <form action="">
                    {{-- @include('partials._select',['label'=>'Adresse de livraison:','name'=>'villes_id','value'=> '','categories'=>$villes]) --}}
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