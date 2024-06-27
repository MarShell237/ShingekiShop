<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{Vite::asset('resources/images/logo7.jpg')}}">
    <title>Shingeki Shop - connection</title>
    @vite(['resources/css/formulaire.css'])
</head>
<body>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf 
            <h2>veuillez vous identifier</h2>
            <div class="inputBox">
                <input type="text" placeholder="Nom complet" name="name">
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Mot de passe" name="password">
            </div>
            <div class="inputBox">
                <input type="submit" value="Connexion">
            </div>
        </form>
    </div>
</body>
</html>
