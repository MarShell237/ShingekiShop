@extends('base')
@section('title','Shingeki Shop - Accueil')
@vite(['resources/css/client/index.css','resources/css/partials/card-article.css'])
{{-- @vite(['resources/js/heart.js','resources/js/star.js','resources/css/card.css']) --}}
@section('content')
    <main>
        <h1 style="margin-top: 90px">Tous Les Articles</h1>
        <section style="margin-top: 90px">
            @forelse ($articles as $article)
                {{-- <card :valeur="{{$article}}"></card> --}}
                @include('partials._card-article',$article)
            @empty
                <h2>Aucun Article Pour L'instant</h2>
            @endforelse
        </section>
        {{$articles->links('pagination')}}
    </main>

    <footer>
        <p>copyright &copy; Shingeki shop 2024</p>
        <div class="social-icons">
            <a target="_blank" href="" title="Notre whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
            <a target="_blank" href="" title="Notre whatsapp"><i class="fa-brands fa-facebook"></i></a>
            <a target="_blank" href="" title="Notre whatsapp"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <a href="">police de confidentialite</a>
    </footer>

    <style>
        .card-article{
    width: 250px;
    border-radius: 10px;
    background-color: rgb(255, 255, 255,0.20);    
    position: relative;
    padding-bottom: 50px;
}

.card-article img{
    width: 100%;
    height: 200px;
    border-radius: 5px 5px 0 0;
}

.card-article div{
    padding: 8px;
}

.card-article .titre-article{
    font-weight: bold;
    font-size: 20px;
}

.card-article .date-article{
    font-weight: 300;
}

/* .card-article a{
    position: absolute;
    bottom: 10px;
    right: 10px;
    left: 10px;
    display: block;
    padding: 8px;
    background-color: #D9AA00;
    border-width: 0;
    font-size: 25px;
    border-radius: 2px;
    text-decoration: none;
    text-align: center;
    color: white;
} */

.description-article{
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 4;
    overflow: hidden;
}

button{
    all: unset;
}

.buttons{
    display: flex;
    justify-content: flex-end;
    column-gap: 15px;
}

a{
    text-decoration: none;
}

.editer{
    background-color: #32A2E1;
    color: white;
    padding: 5px;
    border-radius: 10px;
    width: 50px;
    text-align: center;
    }

.supprimer{
    background-color: #eb2121;
    color: white;
    padding: 5px;
    border-radius: 10px;
    width: 90px;
    text-align: center;

}
    </style>

@endsection
