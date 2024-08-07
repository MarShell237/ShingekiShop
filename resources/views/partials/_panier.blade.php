<hr>
<div class="single-pannier" style="background-color: rgb(255, 255, 255,0.20); padding:25px; border-radius:10px;display:flex;align-items:center;justify-content:space-around;" >
  <div style="display:flex;gap:10px;width:50%">
      <img src="{{$panier->product->image}}" style="width:100%;" alt="">
      <div>
          <p style="width: 100%;font-size:30px;font-weight:bold">{{$panier->product->name}}</p>
          <p>{{$panier->product->description}}</p>
      </div>
  </div>
      <div>
        <p style="color: gold;font-size: 50px;font-weight:bold;text-align:center">
          {{$panier->product->getPrice()}} Fcfa
        </p>
        <form action="{{route('panier.update',$panier)}}" method="POST">
          @csrf
          @method('PUT')
          <label for="quantite" style="font-size:20px;text-decoration:underline;">Quantites:</label>
          @include('partials._input',['type'=>'number','name'=>'quantite'.$panier->id,'placeholder'=>'entrer la quantite de produit','value'=>$panier->quantite])
          <label for="ville_id"  class="label" style="font-size:20px;text-decoration:underline;">
            Adresse de livraison:
          </label>
          @include('partials._select',['name'=>'ville_id','value'=> $panier->ville_id,'categories'=>$villes])
          <update-panier-btn :panier="{{ $panier }}"></update-panier-btn>
        </form>
        <form action="{{route('panier.destroy',$panier)}}" method="post">
          {{-- @dd($panier) --}}
          @csrf
          @method("DELETE")
          <delete-panier-btn :panier="{{ $panier }}"></delete-panier-btn>
        </form>
      </div>
</div> 