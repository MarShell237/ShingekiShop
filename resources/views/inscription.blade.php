<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    @vite(['resources/css/inscription.css','resources/js/formulaire.js','resources/css/all.min.css'])
</head>
<body>
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('client.create_user') }}" method="POST"> 
                @csrf
                @method("POST")
                <div>
                    <h1>creer un compte</h1>
                    <span><i class="fa fa-user"></i><input type="text" name="name" placeholder="nom complet" class="@error('name') is-invalidate @enderror"></span>
                    @error('name')
                        <small class="invalidate">{{ $message }}</small>
                    @enderror

                    <span><i class="fa fa-phone"></i><input type="tel" name="phone" placeholder="numero de telephone" class="@error('phone') is-invalidate @enderror"></span>
                    @error('phone')
                        <small class="invalidate">{{ $message }}</small>
                    @enderror

                    <span><i class="fa-regular fa-envelope"></i><input type="email" name="email" placeholder="adresse email" class="@error('email') is-invalidate @enderror"></span>
                    @error('email')
                        <small class="invalidate">{{ $message }}</small>
                    @enderror

                    <span>
                      <i class="fa fa-city"></i>
                      <select name="ville_id" id="default_city" class="@error('ville_id') is-invalidate @enderror">
                          @foreach ($villes as $id => $ville)
                              <option value="{{ $id+1 }}">{{ $ville->name }}</option>
                          @endforeach
                      </select>                  
                    </span>
                    @error('ville_id')
                        <small class="invalidate">{{ $message }}</small>
                    @enderror


                    <span><i class="fa fa-lock"></i><input type="password" name="password" placeholder="mot de passe" class="@error('password') is-invalidate @enderror"></span>
                    @error('password')
                        <small class="invalidate">{{ $message }}</small>
                    @enderror

                    <button>creer un compte</button>
                </div>
                <span class="fond-noir"></span>
            </form>
        </div>

        <div class="form-container login-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <a href="/ "><img src="{{Vite::asset('resources/images/logo-removebg-preview (5).png')}}" alt="" class="logo" width="150px" height="80px"></a>
                    <h1>Se connecter</h1>
                    <span><i class="fa fa-user"></i><input type="text" placeholder="nom complet" name="name" class="@error('name') is-invalidate @enderror"></span>
                    @error('name')
                        <small class="invalidate">{{ $message }}</small>
                    @enderror
                    <span><i class="fa fa-lock"></i><input type="password" placeholder="mot de passe" name="password" class="@error('password') is-invalidate @enderror"></span>
                    @error('password')
                        <small class="invalidate">{{ $message }}</small>
                    @enderror
                    <button>Se connecter</button>
                </div>
                <span class="fond-noir"></span>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <img src="{{Vite::asset('resources/images/logo-removebg-preview (5).png')}}" alt="" class="logo" width="150px" height="80px">
                <div class="overlay-panel overlay-left">
                    <h1>Bon retour parmis nous!</h1>
                    <p>Pour pouvoir vous connecter entrez vos informations de connection.</p>
                    <button class="ghost" id="login">se connecter</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1>Bonjour!</h1>
                    <p>Entrez vos informations personnels et commencez l'aventure avec nous.</p>
                    <button class="ghost" id="sign-up">Creer un compte</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
