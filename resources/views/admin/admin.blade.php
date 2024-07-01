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

    @vite(['resources/css/style.css','resources/css/all.min.css','resources/css/admin/admin.css'])
    @vite('resources/js/app.js')

</head>
<body id="app">
    <nav>
        <div class="nav-bar">
            <a href="{{ route('admin.product.index') }}"><img src="{{Vite::asset('resources/images/logo-removebg-preview (5).png')}}" alt="" class="logo"></a>
            <form action="" method="GET">
                <div class="search-bar">
                    <input type="search" placeholder="Rechercher..." name="searchValue">
                    <i class="fa fa-search"></i>
                </div>
            </form>
            <div class="options">
                <a href="{{ route('admin.product.index') }}" ><i class="fa fa-tag"></i><span>produits</span></a>
            </div>
            <div class="options">
                <a href="{{ route('admin.article.index') }}"><i class="fa fa-book"></i><span>blog</span></a>
            </div>
            <div class="admin-infos">
                <div>
                    <span>{{Auth::user()->name}}</span>
                    <small>{{Auth::user()->nametitan}}</small>
                </div>
                <img src="{{Vite::asset('resources/images/admin/'.Auth::user()->image)}}" alt="">
            </div>
        </div>


    </nav>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @yield('content')
</body>
</html>
