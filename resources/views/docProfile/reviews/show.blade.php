@extends('layouts.navigation')

@section('content')
    {{-- <div class="container">

        <a class="btn btn-light" href="{{ url()->previous() }}">Back</a>


        <div class="row">
            <h2>Review from {{ $review->username }}</h2>
            <h3>Vote: {{ $review->vote }}</h3>
            <p>{{ $review->text }}</p>

        </div>
    </div> --}}

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Review from {{ $review->username }}</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Arrived:
                    @php
                        //echo date_format($message->created_at, 'Y-m-d H:i:s');
                        $date = new DateTimeImmutable($review->created_at);
                        echo $date->format('j M o G:i');
                        
                    @endphp
                </th>

            </tr>
            <tr>
                <th scope="row">Vote: {{ $review->vote }}</th>

            </tr>
            <tr>
                <th scope="row">{{ $review->text }}</th>

            </tr>
            <tr>
                <th scope="row"><a class="btn btn-light" href="{{ url()->previous() }}">Back</a></th>

            </tr>
        </tbody>
    </table>
@endsection
