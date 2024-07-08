@extends('admin.admin')
@section('title','Shingeki Shop - Admin - Accueil')
@vite(['resources/css/admin/products/index.css','resources/css/admin/article/index.css','resources/css/partials/card-article.css'])
@section('content')
    <section>
        <div class="entete">
            <h1>Tout les Articles</h1>
            <a href="{{ route('admin.article.create') }}" style="text-align: center"><button>Ajouter un Article</button></a>
        </div>
    </section>
    <section>
        @forelse ($articles as $article)
            {{-- <card-admin :valeur={{ $article }}></card-admin> --}}
            @include('partials._card-article-admin',$article)
        @empty
            <h2>Aucun article a afficher pour l'instant</h2>
        @endforelse

    </section>

    {{ $articles->links('pagination') }}

@endsection