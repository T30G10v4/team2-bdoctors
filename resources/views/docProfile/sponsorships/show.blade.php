@extends('layouts.navigation')

@section('content')
    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>

    <div id="dropin-container"></div>
    <button id="submit-button" class="button button--small button--green">
        <a href="{{ route('makePayment') }}">Purchase</a>
    </button>




    <script type="text/javascript">
        // call `braintree.dropin.create` code here

        const button = document.querySelector('#submit-button');
        braintree.dropin.create({
            // container: document.getElementById('dropin-container'),
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            selector: '#dropin-container'
        }, function(err, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    // Submit payload.nonce to your server
                });
            })
        });
    </script>
@endsection
