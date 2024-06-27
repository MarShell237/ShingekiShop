<div class="card-article">
    <img src="{{"/storage/".$article->imagearticle}}" alt="">
    <div>
        <p class="titre-article">{{$article->namearticle}}</p>
        <p class="date-article">{{$article->created_at}}</p>
        <p class="description-article"> {!! $article->descriptionarticle!!}</p>
        <div class="buttons">
            <a href="{{route("admin.article.edit",$article)}}"><button class="editer">Editer</button></a>
            <form action="{{route("admin.article.destroy",$article)}}" style="display: initial" method="POST">
                @csrf
                @method("DELETE")
                <button class="supprimer">Supprimer</button>

            </form>
        </div>
    </div>
</div>
