@extends('layouts.doc_admin')

@section('content')
    <div class="container text-light">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <h2 class="">SHOW</h2>
        <h2>{{ $docProfile->studio_address }}</h2>
        <a class="btn btn-warning" href="{{ route('docProfile.edit', $docProfile->id) }}">Modify Profile</a>

        <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>


        <form action="{{ route('docProfile.destroy', $docProfile->id) }}" method="POST" class="d-inline-block">
            @method('DELETE')
            @csrf
            <button type="submit" class=" delete-btn btn btn-danger">
                Delete Profile
            </button>
        </form>


        @include('partials.delete-modal')
    </div>
@endsection
