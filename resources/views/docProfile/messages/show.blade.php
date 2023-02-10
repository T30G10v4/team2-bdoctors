@extends('layouts.doc_admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-light">Message from {{ $message->username }}</h2>
            <h3 class="text-light">Mail: {{ $message->mail }}</h3>
            <h4 class="text-light">Arrived: {{ $message->created_at }}</h4>
            <h5 class="text-light">text: {{ $message->text }}</h5>
        </div>
    </div>
@endsection
