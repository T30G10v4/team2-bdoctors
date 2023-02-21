@extends('layouts.navigation')

@section('content')
    <div class='container'>
        @foreach ($promos as $promo)
            <div>
                <h2>{{ $promo->name }}</h2>
                <p>{{ $promo->price }} Euro</p>

                <p>{{ $promo->duration }}</p>
                <button class="orderBtn">
                    <a href="{{ route('promos.show', $promo->id) }}"> Purchase </a>
                </button>
            </div>
        @endforeach
    </div>
@endsection
