    {{-- @vite(['resources/css/panier.css']) --}}
    @vite(['resources/css/partials/input.css'])
@extends('base')
@section('content')
    <body style="margin-top: 190px">
                                <h1>Pannier</b></h1>
                                {{-- <div class="col align-self-center text-right text-muted">3 items</div> --}}
                        @php
                            $prixtt=0;
                        @endphp
                        
                        @foreach ($products as $product )
                            @php
                                $id=$product->Users_id;
                            @endphp
                            @php
                                $prixtt+=(int)$product->prix;
                            @endphp

                            <hr>
                            <div class="single-pannier" style="background-color: rgb(255, 255, 255,0.20); padding:25px; border-radius:10px;display:flex;align-items:center;justify-content:space-around;" >
                                <div style="width:300px">
                                    <img src="{{$product->image}}" style="width:100%;" alt="">
                                    <div>
                                        <p style="width: 100%;font-size:25px">{{$product->name_product}}</p>
                                        {{-- <p>{{$product->description}}</p> --}}
                                    </div>
                                </div>
                                    <div>
                                        <label for="quantite" style="font-size:20px">quantity:</label>
                                        <br>
                                        @include('partials._input',['type'=>'number','name'=>'quantite','placeholder'=>'entrer le prix du produit','value'=>1])
                                        <h2>prix:  <span style="color: gold">{{number_format($product->prix,0,' ','.')}} fcfa</span></h2>
                                    <form action="{{route('help.destroy',$product->id)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button  style="background-color:crimson;padding:8px;border-radius:10px;color:white;font-size:20px;border-width:0">Supprimer du pannier</button>
                                    </form>
                                    </div>
                            </div>
                        @endforeach
                        
                        <hr>
                        <h2 style="font-size: 50px">Sommaire</h2>
                            <div class="col" style="font-size:30px">Nombre de produit: <span style="color: gold">{{count($products)}}</span> produit(s) dans le panier</div>                    
                            <div style="font-size: 30px;padding-top:10px;text-decoration:underline;">Prix Total: </div>
                            <div class="col text-right" style="color: gold;font-size:80px;"> {{number_format($prixtt,0,' ','.')}} FCFA </div>                  
                            <a href="{{route('facture.store',\Session::get('Users_id'))}}"><button class="btn" style="background-color:#32A2E1;padding:15px;font-size:20px;color:white;border-width:0;border-radius:10px;margin:0 20px 0 0">Commander</button></a>
                            <a href="{{route('panier.destroy',\Session::get('Users_id'))}}"><button style="background-color:crimson;padding:15px;font-size:20px;color:white;border-width:0;border-radius:10px;">Supprimer le panier</button></a>
                        </div>
@endsection
