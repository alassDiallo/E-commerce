<form action="{{ route('produits.recherche') }}" class="d-flex mr-3">
    <div class="form-group mb-0 mr-1">
    <input type="text" class="form-control @error('recherche') has-invalid @enderror" name="recherche" placeholder="recherche" value="{{  request()->recherche ?? ''  }}">
        @error('recheche')
    <span style="color:red">{{ $message }}</span>
        @enderror
</div>
      <button type="submit" class="btn btn-success" arial-hidden="true"><i class="fa fa-search"></i></button>
  </form>
