<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe with modal</title>
</head>
<body>
    <div class="text-center" style="margin: 50px;">
        <a href="{{url('/')}}" class="text-center">go back to Home</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <form action="{{ route('stripe.payment') }}" method="POST" style="padding:100px;">
        @csrf
        <script
          src="https://checkout.stripe.com/checkout.js"
          class="stripe-button"
          data-key="{{ env('STRIPE_KEY') }}"
          data-name="here go name"
          data-description="here go description"
          data-amount="500"
          data-currency="usd"
          data-image="https://github.githubassets.com/favicons/favicon.png"
          data-label="Pay Now Suzan"
        >
        </script>
    </form>
</body>
</html>
