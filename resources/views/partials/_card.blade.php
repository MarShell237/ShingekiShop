@php
    $isOn = $product->note;
@endphp

<div class="cards-accueil">
    <div class="card">
        <div class="card-top">
            <a href=" {{ route('client.product.show',['slug'=>$product->getSlug(),'product'=>$product]) }} ">
                {{-- <img src="{{$product->imageUrl()}}" alt=""> --}}
                <img src="{{$product->image}}" alt="">
            </a>
            {{-- <label for="heart"><i class="fa fa-heart" id="fa-heart"></i></label>
            <input type="checkbox" name="" id="heart"> --}}
        </div>

        <div class="card-bottom">
            <p class="card-name"><a href=" {{ route('client.product.show',['slug'=>$product->getSlug(),'product'=>$product]) }} ">{{ $product->name }}</a></p>
            <div class="note">
                <div class="stars">
                    <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                    <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                    <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                    <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                    <div class="star @if($isOn) active @php $isOn-- @endphp @endif"></div>
                </div>
                <p>{{$product->nb_vote}} avis</p>
            </div>
            <p>{{$product->price}} fcfa</p>
            <button>
                {{method_field('POST')}}
                <a href="{{route('panier.store',$product->id)}}">
                    <span >Ajouter au panier</span>
                </a>
                <i class="fa fa-cart-shopping"></i>
            </button>
        </div>
    </div>
</div>
