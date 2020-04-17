@extends('layouts.template',['titre'=>'panier'])
@section('content')
@if(Cart::count() > 0)
  <!-- Deuxieme tableau-->
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Produit</th>
        <th scope="col">Prix</th>
        <th scope="col">quantite</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach(Cart::content() as $produit)
      <tr>
      <th scope="row">{{ $produit->model->id }}
      <img src="{{ asset('storage/'.$produit->model->image) }}" width="70" class="img-fluid rounded shadow-sm" />
      <div class="ml-3 d-inline-block align-middle">
        <h5 class="md-0"><a href="" class="text-dark d-inline-block align-middle">{{ $produit->model->titre }}</a></h5>
    <span class="text-muted font-weight-normal font-italic d-block">Categorie</span>
    </div>
    </th>
        <td class="border-0 align-middle"><strong>{{ getPrice($produit->model->prix) }}</strong></td>
        <td class="border-0 align-middle"><strong>1</strong></td>
<td class="border-0 align-middle">
    <form action="{{ route('cart.destroy',$produit->rowId)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-dark" ><i class="fa fa-trash"></i></a></td>
    </form>
</tr>
      @endforeach
    </tbody>
  </table>
@endif
<div class="col-lg-6">
    <div class="bg-light rounded-pill px-3 text-uppercase font-weight-bold">
        Vos commandes
    </div>
<div class="p-4">
<p class="font-italic mb-4"></p>
<ul class="list-unstyled mb-4">
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous Total</strong><strong>{{ getPrice(Cart::subtotal()) }}</strong></li>
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>{{ getPrice(Cart::tax()) }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Autre</strong><strong>CFA 100</strong></li>
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong><h5 class="font-weight-bold">{{ getPrice(Cart::total())}}</h5></li>
</ul>
<a href="{{ route('payement.index') }}" class="btn btn-dark rounded-pill py-2 btn-black">Proceder au payement</a>
</div>
</div>
@endsection
