<div class="card-article">
    <div>
        <img src="{{$article->image_article}}" alt="">
        <p class="titre-article">{{$article->name_article}}</p>
        <p class="date-article">{{$article->created_at}}</p>
        <p class="description-article"> {!! $article->description_article!!}</p>
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
