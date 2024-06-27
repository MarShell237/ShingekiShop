<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amazing - Article-1</title>
    @vite('resources/css/client/article.css')
</head>
<body>
<section>
    <img src="{{"/storage/".$article->imagearticle}}" alt="">
    <h1>{{$article->namearticle}}</h1>
    <p>{!!$article->descriptionarticle!!}</p>

    <a href="/blog" class="retour">Retour a l'accueil</a>
</section>
</body>
</html>
