<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{Vite::asset('resources/images/logo3.png')}}">
    <title>Amazing - not Authorize</title>

    @vite(['resources/css/all.min.css','resources/css/notAuthorize.css'])
</head>
<body>
    <main>
        <i class="fa fa-ban"></i>
        <h1>Vous n'êtes pas autorisé</h1>
        <p>
            Il semble que vous n'ayez pas
            l'autorisation d'utiliser ce portail. Veuillez vous connecter avec un autre compte.
        </p>
        <a href="/">Allez a L'accueil</a>
    </main>
</body>
</html>
