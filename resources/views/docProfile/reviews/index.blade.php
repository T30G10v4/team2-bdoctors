@extends('layouts.doc_admin')

@section('content')
    <h2 class="text-light">reviews</h2>



    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">vote</th>
                <th scope="col">Show</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <th scope="row">{{ $review->username }}</th>
                    <td>{{ $review->vote }}</td>
                    <td><a class="btn btn-primary" href="{{ route('reviews.show', $review->id) }}">Show</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
