<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/css/style.css','resources/css/all.min.css','resources/css/card.css'])
    @vite('resources/js/app.js')
    <title>Shingeki Shop - panier</title>
    {{-- @inertiaHead --}}
  </head>
  <body id="root">
    <nav id="#root">
      <div class="nav-bar">
        <a href="/"><img src="{{Vite::asset('resources/images/logo-removebg-preview (5).png')}}" alt="" class="logo"></a>
      @auth
        <div class="localisation noselect">
          <i class="fa fa-location-dot"></i>
          <span>Adresse de livraison:</span>
          <span>{{ Auth::user()->ville->name }}</span>
        </div>
      @endauth
      @guest
        <div class="localisation noselect">
          <i class="fa fa-location-dot"></i>
          <span>L'adresse de livraison</span>
          <span>s'afficheras ici</span>
        </div>
      @endguest
        <form action="" method="GET">
            <div class="search-bar">
                <input type="search" placeholder="Rechercher..." name="searchValue">
                <i class="fa fa-search"></i>
            </div>
        </form>
        <div class="options">
            <a target="_blank" href="https://wa.me/237697815095" alt="notre whatsapp" title="Notre whatsapp"><i class="fa fa-phone"></i><span>service client</span></a>
        </div>
        <div class="options">
            <a href="{{route('client.article.index')}}">
                <i class="fa fa-book"></i>
                <span>blog</span>
            </a>
        </div>
        @auth
            <div class="options"  style="display: inline">
                <form action="{{ route('login') }}" method="POST" style="display: inline">
                    @csrf
                    @method("DELETE")
                    <button style="all:unset;display: inline-flex;flex-direction:column;align-items:center;">
                        <i class="fa fa-right-from-bracket"></i>
                        <span>deconnection</span>
                    </button>
                </form>
            </div>    
        @endauth
        @guest
            <div class="options">
                <a href="{{ route('login') }}"><i class="fa fa-circle-user"></i><span>connection</span></a>
            </div>    
        @endguest
        <div class="options">
        <a href="{{route('panier.index')}}" style="position: relative"> 
            <i class="fa fa-cart-shopping"></i>
            <span >panier</span>
            <nb-panier></nb-panier>
        </a>
        </div>
        </div>
        @if (strpos(Route::currentRouteName(),'product') || Route::currentRouteName() === '/')
            <div class="filter-bar">
                <a href="{{ route('client.product.index') }}"><button>Tout</button></a>
                @foreach ($categories as $categorie)
                    <a href="{{ route('client.product.filter',$categorie->id) }}"><button>{{ $categorie->name }}</button></a>
                @endforeach
              </div>
          @endif
    </nav>
    <main>
      <index></index>
    </main>
    {{-- @inertia --}}
  </body>
</html>