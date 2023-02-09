@extends('layouts.doc_admin')

@section('content')
    <div class="container text-light">
        <h2 class="">SHOW</h2>
        <h2>{{ $docProfile->studio_address }}</h2>
        <a class="btn btn-warning">Modify Profile</a>
        <a class="btn btn-danger">Delete Profile</a>
        <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>
    </div>
@endsection
