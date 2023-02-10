@extends('layouts.doc_admin')

@section('content')
    <div class="container text-light">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <h2 class="">Profile</h2>

        <p>{{ $users->name }}</p>

        <p>{{ $docProfile->studio_address }}</p>
        <p>{{ $docProfile->tel }}</p>

        <p>{{ $docProfile->services }}</p>


        {{-- <div class="specializations">
            @forelse ($docProfile->$specializations as $specialization)
                <span class="text-danger">{{ $specialization->name }}</span>
            @empty
                <span>No secondary specialization</span>
            @endforelse
        </div> --}}

        <div class="text-center">
            @if ($docProfile->photo)
                <img src="{{ asset('storage/' . $docProfile->photo) }}" alt="doctor photo " style="max-width:300px">
            @else
                <div class="w-50 bg-secondary py-4 text-center">
                    No Image
                </div>
            @endif
        </div>

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
