@extends('layouts.doc_admin')

@section('content')
    <h2 class="text-light">Welcome {{ Auth::user()->name }}</h2>


    <a class="btn btn-success" href="{{ route('docProfile.create') }}">New Profile</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @foreach ($docProfile as $item)
        @if (isset($item->id))
            <a class="btn btn-primary" href="{{ route('docProfile.show', $item->id) }}">Show Profile</a>
        @endif
    @endforeach
@endsection
