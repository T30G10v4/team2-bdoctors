@extends('layouts.navigation')

@section('content')
    {{-- <table class="table table-dark">
        <thead>
            <tr>
                <p scope="col">Message from {{ $message->username }}</p>
            </tr>
        </thead>
        <tbody>
            <tr>
                <p>Mail: {{ $message->mail }}</p>
            </tr>
            <tr>
                <p>Arrived: {{ $message->created_at }}</p>
            </tr>
            <tr>
                <p>{{ $message->text }}</p>
            </tr>
            <tr>
                <a class="btn btn-light" href="{{ url()->previous() }}">Back</a>
            </tr>
        </tbody>
    </table> --}}
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Message from {{ $message->username }}</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Arrived:
                    @php
                        //echo date_format($message->created_at, 'Y-m-d H:i:s');
                        $date = new DateTimeImmutable($message->created_at);
                        echo $date->format('j M o h:i');
                        
                    @endphp
                </th>

            </tr>
            <tr>
                <th scope="row">Mail: {{ $message->mail }}</th>

            </tr>
            <tr>
                <th scope="row">{{ $message->text }}</th>

            </tr>
            <tr>
                <th scope="row"><a class="btn btn-light" href="{{ url()->previous() }}">Back</a></th>

            </tr>
        </tbody>
    </table>
@endsection
