<div class="card-article">
    <div>
        <img src="{{"/storage/".$article->imagearticle}}" alt="">
        <p class="titre-article">{{$article->namearticle}}</p>
        <p class="date-article">{{$article->created_at}}</p>
        <p class="description-article"> {!! $article->descriptionarticle!!}</p>
        <div class="buttons">
            <a href="{{route("admin.article.edit",$article)}}"><button class="editer">Editer</button></a>
            <form action="{{route("admin.article.destroy",$article)}}" style="display: inline;margin:0;" method="POST">
                @csrf
                @method("DELETE")
                <button class="supprimer">Supprimer</button>
            </form>
        </div>
    </div>
</div>
