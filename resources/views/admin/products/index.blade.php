@extends('admin.admin')
@section('title','Shingeki Shop - Admin - Accueil')
@vite(['resources/css/admin/products/index.css'])
@section('content')
    <section>
        <div class="entete">
            <h1>Tout les Produits</h1>
            <a href="{{ route('admin.product.create') }}"><button>Ajouter un produit</button></a>
        </div>
    </section>
    <section>
        @forelse ($products as $product)
            {{-- @include('partials._card-admin',$product) --}}
            <card-admin :product="{{$product}}" slug="{{$product->getSlug()}}"></card-admin>
        @empty
            <h2>Aucun produit a afficher pour l'instant</h2>
        @endforelse

    </section>

    {{ $products->links('pagination') }}

@endsection