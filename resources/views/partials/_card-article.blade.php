    <div class="card-article">
        <div>
            <img src="{{$article->image_article}}" alt="">
            <p class="titre-article">{{$article->name_article}}</p>
            <p class="date-article">{{$article->created_at->format('d M Y')}}</p>
            <p class="description-article"> {!! $article->description_article!!}</p>
            <a href="{{ route('client.article.show',$article) }}"><button class="editer" style="width: 90%">Lire L'article</button></a>
        </div>
    </div>

