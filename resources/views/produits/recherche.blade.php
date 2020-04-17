@extends('layouts.template',['titre'=>'recherche'])
@section('content')
@foreach ($produits as $produit)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">
                 @foreach ($produit->categories as $categorie)
                     {{ $categorie->nom }}
                 @endforeach
            </strong>
          <h5 class="mb-0">{{ $produit->titre }}</h5>
            <div class="mb-1 text-muted">{{ $produit->created_at->format('d/m/Y') }}</div>
            <p class="card-text mb-auto">{{ $produit->sousTitre }}.</p>
          <strong>{{ $produit->getPrix() }}</strong>
          <a href="{{ route('produits.show',$produit->slug) }}" class="stretched-link btn btn-info">voir l'article</a>
          </div>
          <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('storage/'.$produit->image) }}">
          </div>
        </div>
      </div>
    @endforeach
    {{ $produits->appends(request()->input())->links() }}
    @endsection
