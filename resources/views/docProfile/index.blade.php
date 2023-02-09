@extends('layouts.doc_admin')

@section('content')
    <h2 class="text-light">Welcome {{ Auth::user()->name }}</h2>
    @if ($docProfile)
        <a class="btn btn-primary">Show Profile</a>
        <a class="btn btn-warning">Modify Profile</a>
        <a class="btn btn-danger">Delete Profile</a>
    @else
        <a class="btn btn-success" href="{{ route('docProfile.create') }}">New Profile</a>
    @endif
@endsection
