@extends('layouts.navigation')

@section('content')
    <div class="mt-4">
        <h3>Why sponsor your profile? ☝</h3>
        <div style="width: 70%; margin:0 auto">
            <p class="ml-5">

                With a sponsorship you will always be first sight for your patients,
                your profile will appear in the top positions when the user searches for your specialization
            </p>
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

        <div class="row-card container d-flex justify-content-around gap-3 mt-4">

            @foreach ($promos as $promo)
                <label style="border:1px solid black; border-radius:10px; padding: 15px"
                    class="sponsorship-card d-flex flex-column h-100 text-light bg-dark" style="max-height: 150px;">
                    <div class="sponsorship title-promo">
                        <h5 style="color:gold">Promotion</h5>
                        <h5> {{ $promo->name }}</h5>
                        <h5>{{ $promo->duration }}h</h5>
                    </div>

                    <div class="sponsorship price-promo">
                        <h6>€{{ $promo->price }}</h6>

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


        <button type="submit" id="pay-button" class="button button--small button--green d-none">
            <a>Pay</a>
        </button>
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

        const payBtn = document.querySelector('#pay-button')

        button.addEventListener('click', function() {
            payBtn.classList.remove("d-none");
            button.classList.add("d-none");

            console.log('pippi')
        });
    </script>
@endsection
