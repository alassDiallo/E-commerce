
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
  <title>{{ $titre }}</title>
    <!-- Bootstrap core CSS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')

  <link  rel="stylesheet" href="{{ asset('css/css.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-3 pt-1">
      <a class="text-muted" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart mr-2" height="24"></i>Panier <span class="badge badge-pill badge-dark">{{ Cart::count() }}</span></a>
      </div>
      <div class="col-3 text-center">
      <a class="blog-header-logo text-dark" href="{{ route('produits.index') }}"><h5>SUNU SUPER<h5></a>
      </div>
      <div class="col-3 d-flex justify-content-end align-items-center">

        @include('layouts.partials.auth')
      </div>
    </div>
  </header>

  <div class="col-lg-12 mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">A propos</a>
          </li>
          <li class="nav-item dropdown cat">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Categoties
            </a>
            <div class="dropdown-menu menuCat" aria-labelledby="navbarDropdown">
              @foreach (App\Models\Categorie::all() as $categorie)
      <a class="dropdown-item" style=""  href="{{ route('produits.index',['categorie'=>$categorie->slug]) }}"> {{ $categorie->nom   }}</a>
          @endforeach
            </div>
          </li>
        </ul>
        <form action="{{ route('produits.recherche') }}" class="form-inline my-2 my-lg-0">
          <div class="form-group mb-0 mr-1">
          <input type="search" class="form-control mr-sm-2 @error('recherche') has-invalid @enderror" name="recherche" placeholder="recherche" value="{{  request()->recherche ?? ''  }}" aria-label="Search"/>
              @error('recheche')
          <span style="color:red">{{ $message }}</span>
              @enderror
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
        <!--<form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        </form>
      </div>
    </nav>
  </div>
  <div class="container">
  @if(session('message'))
  <div class="alert alert-success">
      {{ session('message') }}
  </div>
  @endif
 <!-- <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>-->
@if(request()->recherche)
<h2>{{ $produits->total() }} {{ Str::plural('resultat',$produits->count()) }}  trouvé pour le produits "{{  request()->recherche  }}"</h2>
@endIf
  <div class="row mb-2">
    @yield('content')
</div>
  </div>
</div>
<footer class="col-lg-12 blog-footer bg-dark" style="color:white;">
    <div class="row container">
  <div class="col-lg-4">
    &copy copyright <a href="https://getbootstrap.com/">al hassane diallo</a>SamaTenu<a href="https://twitter.com/mdo">@mdo</a>.</p>
  </div>
  <div class="col-lg-4">
    <h4>Service Client</h4>
    <ul class="list list-block">
      <li><a href="www.gmail.com"> alassdiallo58@gmail.com</a></li>
      <li>Telephone : 774298343</li>
    </ul>
  </div>
  <div class="col-lg-4 text-center mt-3" style="color:white;">
    <h4>SuiveZ nous sur</h4>
    <a style="height:50px;" href="https://www.facebook.com/PadLigne-589417881567431/"><i class="fa fa-facebook-official" ></i></a>
    <a><i class="fa fa-twitter-square"></i></a>
    <a><i class="fa fa-instagram"></i></a>
  </div>
    </div>
    <p>
      <a href="#">Retourner en haut</a>
    </p>
  </footer>

@yield('extra-js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script>
    $(document).ready(function(){
       $('.menuCat').hide();
       $('.cat').hover(
        function(){$('.menuCat').show();},function(){$('.menuCat').hide();}
       );
    });
    </script>
</body>
</html>
