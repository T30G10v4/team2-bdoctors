@extends('layouts.doc_admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-light">Review from {{ $review->username }}</h2>
            <h3 class="text-light">Vote: {{ $review->vote }}</h3>
            <h4 class="text-light">text: {{ $review->text }}</h4>


        </div>
    </div>
@endsection
