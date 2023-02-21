@extends('layouts.navigation')

@section('content')
    <div>
        <h1>Perchè sponsorizzare il tuo profilo? ☝</h1>
        <h4>Con una sponsorizzazione sarai sempre in prima vista per i tuoi pazienti,
            il tuo profilo uscirà nelle prime posizioni quando l'utente cercherà nella tua specializzazione
        </h4>
    </div>

    <div class='container d-flex justify-content-center gap-3'>
        @foreach ($promos as $promo)
            <div class="mx-4">
                <h2>{{ $promo->name }}</h2>
                <p>{{ $promo->price }} Euro</p>

                <p>{{ $promo->duration }} h</p>
                <button class="orderBtn">
                    <a href="{{ route('promos.show', $promo->id) }}"> Purchase </a>
                </button>
            </div>
        @endforeach
    </div>
@endsection
