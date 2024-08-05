@extends('admin.admin')
@section('title',$article->exists ?  'Shingeki Shop - Admin - formulaire d\'edition d\'article' : 'Shingeki Shop - Admin - formulaire de creation d\'article')
@vite(['resources/css/admin/products/form.css','resources/css/partials/input.css','resources/css/admin/article/form.css'])
@section('content')
    <section>
        <h1>@yield('title')</h1>
        <form action="{{ route($article->exists ? 'admin.article.update' : 'admin.article.store',$article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($article->exists ? 'PUT' : 'POST')
            @include('partials._input',['type'=>'file','label'=>'Image d\'article','name'=>'imagearticle',"value"])
            @include('partials._input',['label'=>'Nom de l\'article','name'=>'namearticle','placeholder'=>'entrer le nom du produit','value'=>$article->name_article])
            @include('partials._input',['type'=>'textarea','label'=>'Description','name'=>'descriptionarticle','placeholder'=>'entrer La description du produit','value'=>$article->description_article])
            <button>
                @if ($article->exists)
                    Modifier
                @else
                    Creer
                @endif
            </button>
        </form>
    </section>
@endsection