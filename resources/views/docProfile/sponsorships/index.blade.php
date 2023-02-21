@extends('layouts.navigation')

@section('content')
    <div>
        <h1>Perchè sponsorizzare il tuo profilo? ☝</h1>
        <h4>Con una sponsorizzazione sarai sempre in prima vista per i tuoi pazienti,
            il tuo profilo uscirà nelle prime posizioni quando l'utente cercherà nella tua specializzazione
        </h4>
    </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>

    <div id="dropin-container"></div>
    <button id="submit-button" class="button button--small button--green">
        <a href="{{ route('makePayment') }}">Purchase</a>
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

        <div class="row-card">




            @foreach ($promos as $promo)
                <label class="sponsorship-card d-flex flex-column h-100">
                    <div class="sponsorship title-promo">
                        {{ $promo->name }}
                    </div>

                    <div class="sponsorship price-promo">
                        €{{ $promo->price }}

                    </div>
                    <div class="sponsorship">
                        <input required type="radio" name="sponsors" value="{{ $promo->id }}">
                    </div>
                </label>
            @endforeach
        </div>
        <div id="dropin-container"></div>
        <input type="submit" class="btn our-btn-header" id="submit-button" token="{{ $token }}">
        <input type="hidden" id="nonce" name="payment_method_nonce">
        <input type="hidden" name="promo" value="{{ $promo->id }}">
    </form>








    <script>
        const button = document.querySelector('#submit-button');
        const token = button.getAttribute('token');
        console.log('pipi');
        braintree.dropin.create({
            authorization: token,
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
