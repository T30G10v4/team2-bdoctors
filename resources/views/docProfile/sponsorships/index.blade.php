@extends('layouts.navigation')

@section('content')
    <div class='container'>
        @foreach ($promos as $promo)
            <div>
                <h2>{{ $promo->name }}</h2>
                <p>{{ $promo->price }} Euro</p>

                <p>{{ $promo->duration }} h</p>
                <button>
                    <a href="{{ route('promos.show', $promo->id) }}"> Dettagli </a>
                </button>
            </div>
        @endforeach
    </div>
@endsection
