@extends('admin.admin')
@section('title','Shingeki Shop - Admin - Accueil')
@vite(['resources/css/admin/products/index.css','resources/css/admin/products/card.css'])
@section('content')
    <section>
        <div class="entete">
            <h1>Tout les Produits</h1>
            <a href="{{ route('admin.product.create') }}"><button>Ajouter un produit</button></a>
        </div>
    </section>
    <section>
        @forelse ($products as $product)
            {{-- <card-admin :valeur={{ $product }}></card-admin> --}}
            @include('partials._card-admin',$product)
        @empty
            <h2>Aucun produit a afficher pour l'instant</h2>
        @endforelse

    </section>

    {{ $products->links() }}

@endsection