@php
    $isOn = $product->note;
@endphp



<div class="cards-accueil">
    <div class="card">
        <div class="card-top">
            <img src="{{$product->imageUrl()}}" alt="">
            {{-- <label for="heart"><i class="fa fa-heart" id="fa-heart"></i></label>
            <input type="checkbox" name="" id="heart"> --}}
        </div>

        <div class="card-bottom">
            <p class="card-name">{{$product->name}}</p>
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
            <div class="buttons">
                <a href="{{ route('admin.product.edit',$product) }}"><button>editer</button></a>
                <form action="{{ route('admin.product.destroy',$product) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button>supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
