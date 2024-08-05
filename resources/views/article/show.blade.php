<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shingeki Shop - {{$article->name_article}} </title>
    @vite('resources/css/client/article.css')
</head>
<body>
<section>
    <div style="display: flex;justify-content:center"><img src="{{$article->image_article}}" alt=""></div>
    <h1>{{$article->name_article}}</h1>
    <p>{!!$article->description_article!!}</p>

    <a href="{{route('client.article.index')}}" class="retour">Retour a l'accueil</a>
</section>
</body>
</html>
