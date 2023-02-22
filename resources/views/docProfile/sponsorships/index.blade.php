@extends('layouts.navigation')

@section('content')
    <div class="mt-4">
        <h1>Perchè sponsorizzare il tuo profilo? ☝</h1>
        <div style="width: 70%; margin:0 auto">
            <h4 class="ml-5">Con una sponsorizzazione sarai sempre in prima vista per i tuoi pazienti,
                il tuo profilo uscirà nelle prime posizioni quando l'utente cercherà nella tua specializzazione
            </h4>
        </div>
    </div>

    <form action="{{ route('makePayment') }}" id="payment-form" method="post">

        @csrf

        {{-- <select name="sponsors" id="sponsor" class="form-select w-50 @error('sponsors') is-invalid @enderror" required>
        <option value="">Seleziona una sponsorizzazione</option>
        @foreach ($sponsors as $sponsor)
            <option value="{{$sponsor->id}}">{{ $sponsor->type }}</option>
        @endforeach
    </select>
    @error('sponsors')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
         --}}

        <div class="row-card container d-flex justify-content-around gap-3 mt-5">

            @foreach ($promos as $promo)
                <label style="border:1px solid black; border-radius:8px; padding: 15px"
                    class="sponsorship-card d-flex flex-column h-100 ">
                    <div class="sponsorship title-promo">
                        <h3>Promotion:</h3>
                        <h3> {{ $promo->name }} </h3>
                    </div>

                    <div class="sponsorship price-promo">
                        <h4>€{{ $promo->price }}</h4>

                    </div>
                    <div class="sponsorship">
                        <input required type="radio" name="sponsors" value="{{ $promo->id }}">
                    </div>
                </label>
            @endforeach
        </div>
        <div id="dropin-container"></div>
        {{-- <input type="submit" class="btn our-btn-header" id="submit-button" token="{{ $token }}"> --}}
        {{-- <input type="hidden" id="nonce" name="payment_method_nonce">
    <input type="hidden" name="promo" value="{{ $promo->id }}"> --}}
    </form>


    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>

    <div id="dropin-container"></div>
    <button id="submit-button" class="button button--small button--green">
        <a>Confirm card</a>
    </button>


    {{-- <div class='container d-flex justify-content-center gap-3'>
        @foreach ($promos as $promo)
            <div class="mx-4">
                <h2>{{ $promo->name }}</h2>
                <p>{{ $promo->price }} Euro</p>

                <p>{{ $promo->duration }} h</p>
                <button class="orderBtn">
                    <a href="{{ route('promos.show', $promo) }}"> Purchase </a>
                </button>
            </div>
        @endforeach
    </div> --}}










    <form action="{{ route('payment.update', $docProfile[0]->id) }}" method="POST">
        @method('PUT')
        @csrf

        <button type="submit">Pay Sponsorization</button>
    </form>




    <script>
        const button = document.querySelector('#submit-button');
        // const token = button.getAttribute('token');

        braintree.dropin.create({
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
