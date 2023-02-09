@extends('layouts.doc_admin')

@section('content')
    <h2 class="text-light">Welcome {{ Auth::user()->name }}</h2>


    <a class="btn btn-success" href="{{ route('docProfile.create') }}">New Profile</a>

    @foreach ($docProfile as $item)
        @if (isset($item->id))
            <a class="btn btn-primary" href="{{ route('docProfile.show', $item->id) }}">Show Profile</a>
        @endif
    @endforeach

    {{-- 
    

    <ul class="text-light">
        @foreach ($docProfile as $doc)
            <li>{{ $doc }}</li>
        @endforeach
    </ul> --}}
@endsection
