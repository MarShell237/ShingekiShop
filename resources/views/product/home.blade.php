@extends('base')
@section('title','Shingeki Shop - Accueil')
@vite(['resources/css/accueil.css','resources/css/bulles.css'])
{{-- @vite(['resources/js/heart.js','resources/js/star.js','resources/css/card.css']) --}}
@section('content')
    <main>
        <section>
          <div class="images-accueil"></div>
        </section>

        <section>
            <h1>Les meilleurs Mangas</h1>
            <div class="content">
              @foreach ($bestMangas as $product)
                <card :product="{{$product}}" slug="{{$product->getSlug()}}"></card>
                {{-- @include('partials._card',$product) --}}
              @endforeach
            </div>
        </section>

        <section>
          <h1>Les meilleurs Figurines</h1>
          <div class="content">
            @foreach ($bestFigurines as $product)
              <card :product="{{$product}}" slug="{{$product->getSlug()}}"></card>
              @endforeach
            </div>
        </section>

        <section>
            <h1>Les meilleurs Habits</h1>
            <div class="content">
                @foreach ($bestHabits as $product)
                  <card :product="{{$product}}" slug="{{$product->getSlug()}}"></card>
                @endforeach
            </div>
        </section>
        
        <section>
            <h1>Les meilleurs Accesoires</h1>
            <div class="content">
                @foreach ($bestAccesoires as $product)
                  <card :product="{{$product}}" slug="{{$product->getSlug()}}"></card>
                @endforeach
            </div>
        </section>

        <section>
            <h1>Les meilleurs Sons</h1>
            <div class="content">
                @foreach ($bestSons as $product)
                    <card :product="{{$product}}" slug="{{$product->getSlug()}}"></card>
                @endforeach
            </div>
        </section>

        <section>
            <h1>Les meilleurs Jeux videos</h1>
            <div class="content">
                @foreach ($bestGame as $product)
                  <card :product="{{$product}}" slug="{{$product->getSlug()}}"></card>
                @endforeach
            </div>
        </section>


        <ul class="circles">
            {{-- <li><img src="{{Vite::asset('images/eren-formulaire.jpg')}}" alt=""></li> --}}
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
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
