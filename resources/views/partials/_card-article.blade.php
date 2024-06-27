    <div class="card-article">
        <img src="{{"/storage/".$article->imagearticle}}" alt="">
        <div>
            <p class="titre-article">{{$article->namearticle}}</p>
            <p class="date-article">{{$article->created_at}}</p>
            <p class="description-article"> {!! $article->descriptionarticle!!}</p>
            <a href="{{ route('client.article.show',$article) }}"><button class="editer" style="width: 90%">Lire L'article</button></a>
        </div>
    </div>

