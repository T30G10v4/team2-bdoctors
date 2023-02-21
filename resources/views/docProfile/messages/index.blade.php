@extends('layouts.navigation')

@section('content')
    <h2>Messages</h2>
    <a class="btn btn-light" href="{{ url()->previous() }}">Back</a>


    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Mail</th>
                {{-- <th scope="col">Last</th> --}}
                <th scope="col">Received</th>
                <th scope="col">Show</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <th scope="row">{{ $message->username }}</th>
                    <td>{{ $message->mail }}</td>
                    {{-- <td>{{ $message->text }}</td> --}}
                    <td> @php
                        
                        $date = new DateTimeImmutable($message->created_at);
                        echo $date->format('j M o G:i');
                        
                    @endphp</td>
                    <td><a class="btn btn-primary" href="{{ route('messages.show', $message->id) }}">Show</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
