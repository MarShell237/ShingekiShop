@extends('admin.admin')
@section('title',$product->exists ?  'Shingeki Shop - Admin - formulaire d\'edition' : 'Shingeki Shop - Admin - formulaire de creation')
@vite(['resources/css/admin/products/form.css','resources/css/partials/input.css','resources/css/partials/select.css'])
@section('content')
    <h1 style="margin-top: 150px">@yield('title')</h1>
    <form action="{{ route($product->exists ? 'admin.product.update' : 'admin.product.store',$product) }}" method="POST" enctype="multipart/form-data" class="form-create">
        @csrf
        @method($product->exists ? 'PUT' : 'POST')

        @include('partials._input',['type'=>'file','label'=>'Image','name'=>'image'])
        @include('partials._input',['label'=>'Nom','name'=>'name','placeholder'=>'entrer le nom du produit','value'=>$product->name])
        @include('partials._input',['type'=>'number','label'=>'Prix','name'=>'price','placeholder'=>'entrer le prix du produit','value'=>$product->price])
        @include('partials._input',['type'=>'textarea','label'=>'Description','name'=>'description','placeholder'=>'entrer La description du produit','value'=>$product->description])
        @include('partials._select',['label'=>'Categorie','name'=>'categories_id','value'=> $product->categories_id,'categories'=>$categories])
        <button>
            @if ($product->exists)
                Modifier
            @else
                Creer
            @endif
        </button>
    </form>
@endsection