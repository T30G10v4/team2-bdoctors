@extends('layouts.navigation')

@section('content')
    <div class="container">

        <a class="btn btn-light" href="{{ url()->previous() }}">Back</a>


        <div class="row">
            <h2>Review from {{ $review->username }}</h2>
            <h3>Vote: {{ $review->vote }}</h3>
            <p>{{ $review->text }}</p>

        </div>
    </div>
@endsection
