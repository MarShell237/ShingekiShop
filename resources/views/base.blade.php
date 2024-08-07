<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Raleway:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <link rel="icon" href="{{Vite::asset('resources/images/logo3.png')}}">
    <title>@yield('title')</title>

    @vite(['resources/css/style.css','resources/css/all.min.css'])
    @vite(['resources/js/app.js','resources/js/responsive-navbar.js',])

</head>
<body id="root">
  <nav>
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
        <div class="options deconnection">
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
        <span>panier</span>
        <nb-panier></nb-panier>
      </a>
    </div>
    <div class="responsive-menu"></div>
      </div>

      <div class="responsive-nav-bar">
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
          <div class="options deconnection">
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
          <span>panier</span>
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

  @yield('content') 
</body>
</html>
