@extends('layouts.template',['titre'=>'page de payement'])
@section('js')
<script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
<div class="col-lg-12">
    <h1>
        Page de payement
    </h1>
</div>
<div class="row">
    <div class="col-mb-6">
        <form ection="#" id="payment-form" class="my-4">
            <div id="card-element">
              <!-- Elements will create input elements here -->
            </div>

            <!-- We'll put the error messages in this element -->
            <div id="card-errors" role="alert"></div>

            <button id="submit" class="btn btn-success mt-4">Procede payement</button>
          </form>
    </div>
</div>
@endsection
@section('extra-js')
<script>
var stripe = Stripe('pk_test_2Z5ySaoWZn85S0zuiX9M2rit00fPXP1fPj');
var elements = stripe.elements();
var  style  =  {
    base : {
      couleur : "# 32325d" ,
      fontFamily : '"Helvetica Neue", Helvetica, sans-serif' ,
      fontSmoothing : "anti- crénelé " ,
      fontSize : "16px" ,
      ":: placeholder" : {
        couleur : "# aab7c4"
      }
    } ,
    invalide : {
      couleur : "# fa755a" ,
      iconColor : "# fa755a"
    }
  } ;
    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.addEventListener('change', ({error}) => {
  const displayError = document.getElementById('card-errors');
  if (error) {
    displayError.textContent = error.message;
  } else {
    displayError.textContent = '';
  }
});
var form = document.getElementById('payment-form');

form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  stripe.confirmCardPayment("{{ $clientSecret }}", {
    payment_method: {
      card: card
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
      }
    }
  });
});
</script>
@endsection

