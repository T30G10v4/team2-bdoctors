@extends('layouts.doc_admin')

@section('content')
    <h2 class="text-light">Welcome {{ Auth::user()->name }}</h2>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-light">PROFILE SECTION</h2>

    @if (!$thereIsProfile)
        <a class="btn btn-success" href="{{ route('docProfile.create') }}">New Profile</a>
    @else
        <a class="btn btn-primary" href="{{ route('docProfile.show', $thereIsProfile) }}">Show Profile</a>
    @endif

    <h2 class="text-light">MESSAGES SECTION</h2>


    <div class="container">
        <div class="row mt-3">
            <a class="btn btn-primary" href="{{ route('messages.index') }}">Show Messages</a>
        </div>
    </div>

    <h2 class="text-light">REVIEWS SECTION</h2>


    <div class="container">
        <div class="row mt-3">
            <a class="btn btn-primary" href="{{ route('reviews.index') }}">Show Reviews</a>
        </div>
    </div>
@endsection
