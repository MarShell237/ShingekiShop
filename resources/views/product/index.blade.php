@extends('base')
@section('title','Shingeki Shop - Accueil')
@vite(['resources/css/client/index.css'])
{{-- @vite(['resources/js/heart.js','resources/js/star.js','resources/css/card.css']) --}}
@section('content')
    <main>
        <h1>Tous Les {{$filter_title}}</h1>
        <section>
            @forelse ($products as $product)
                {{-- <card :valeur="{{$product}}"></card> --}}
                <card :valeur="{{$product}}" slug="{{$product->getSlug()}}"></card>
                @empty
                <h2>Aucun {{$filter_title}} Pour L'instant</h2>
            @endforelse
        </section>
        {{$products->links('pagination')}}
    </main>

    <footer>
        <p>copyright &copy; Shingeki shop 2024</p>
        <div class="social-icons">
            <a target="_blank" href="" title="Notre whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
            <a target="_blank" href="" title="Notre whatsapp"><i class="fa-brands fa-facebook"></i></a>
            <a target="_blank" href="" title="Notre whatsapp"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <a href="">police de confidentialite</a>
    </footer>

@endsection
