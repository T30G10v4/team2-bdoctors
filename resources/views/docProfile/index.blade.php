@extends('layouts.doc_admin')

@section('content')
    <h2 class="text-light">Welcome {{ Auth::user()->name }}</h2>

    <a class="btn btn-primary" {{-- href="{{ route('docProfile.show', $docProfile->id) }}" --}}>Show Profile</a>
    <a class="btn btn-warning">Modify Profile</a>
    <a class="btn btn-danger">Delete Profile</a>

    <a class="btn btn-success" href="{{ route('docProfile.create') }}">New Profile</a>
@endsection
