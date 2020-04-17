
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
      <div class="col-4 pt-1">
      <a class="text-muted" href="{{ route('cart.index') }}">Panier <span class="badge badge-pill badge-dark">{{ Cart::count() }}</span></a>
      </div>
      <div class="col-4 text-center">
      <a class="blog-header-logo text-dark" href="{{ route('produits.index') }}"><h5>SUNU SUPER<h5></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        @include('layouts.partials._partial')
        @include('layouts.partials.auth')
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach (App\Models\Categorie::all() as $categorie)
    <a class="p-2 text-muted" href="{{ route('produits.index',['categorie'=>$categorie->slug]) }}"> {{ $categorie->nom   }}</a>
        @endforeach

    </nav>
  </div>
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


      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>
    </div>
<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
@yield('extra-js')
</body>
</html>
