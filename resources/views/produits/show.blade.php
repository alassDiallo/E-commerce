@extends('layouts.template',['titre'=>'page Produit'])
@section('content')
    <div class="col-md-12">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">
                @foreach ($produit->categories as $categorie)
                {{ $categorie->nom }}
            @endforeach</strong>
          <h5 class="mb-0">{{ $produit->titre }}</h5>
            <div class="mb-1 text-muted">{{ $produit->created_at->format('d/m/Y') }}</div>
            <p class="card-text mb-auto">{!! $produit->description !!}</p>
          <strong>{{ $produit->getPrix() }}</strong>
          <form action="{{ route('cart.store') }}" method="POST">
              @csrf
          <input type="hidden" name="produit_id" value="{{ $produit->id }}">
              <button class="btn btn-success" type="submit" >Ajouter a mon panier</button>
          </form>
          </div>
          <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('storage/'.$produit->image) }}">
          <div class="mt-2">
            @if($produit->images)
              @foreach(json_decode($produit->images,true) as $images)
              <img src="{{ asset('storage/'.$images) }}" width="50" class="img-thumbnail">
              @endforeach
              @endif
          </div>

          </div>
        </div>
      </div>
@endsection

