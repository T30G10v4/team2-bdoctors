@extends('layouts.navigation')

@section('content')
    <div class="container">

        <a class="btn btn-light" href="{{ url()->previous() }}">Back</a>

        <div class="row">
            <h2>Message from {{ $message->username }}</h2>
            <h3>Mail: {{ $message->mail }}</h3>
            <h4>Arrived: {{ $message->created_at }}</h4>
            <p>{{ $message->text }}</p>
        </div>
    </div>
@endsection
