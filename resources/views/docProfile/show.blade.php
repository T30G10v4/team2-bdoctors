@extends('layouts.navigation')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 col-sm-12">
                <h2 class="text-center">MY PROFILE</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h3>Studio address</h3>
                <p>{{ $docProfile[0]->studio_address }}</p>
                <h3>Telephone number</h3>
                <p>{{ $docProfile[0]->tel }}</p>
                <h3>Specializations</h3>
                <table class="table table-dark table-striped">
                    <tbody>
                        @forelse ($docProfile[0]->specializations as $specialization)
                            <tr>
                                <td>{{ $specialization->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Secondary Specializations</td>
                            </tr>
                        @endforelse
                </table>
                <h3>Services</h3>
                <p>{{ $docProfile[0]->services }}</p>
            </div>
            <div class="col-6">
                <h3>Photo</h3>
                @if ($docProfile[0]->photo)
                    <img src="{{ asset('storage/' . $docProfile[0]->photo) }}"
                        alt="{{ 'Cover image di ' . $docProfile[0]->slug }}" class="rounded-circle img-fluid mt-3">
                @else
                    <div class="rounded-circle img-fluid mt-3">
                        No Image
                    </div>
                @endif

                <h3>Curriculum Vitae</h3>
                @if ($docProfile[0]->curriculum_vitae)
                    <div class="mt-3">
                        <embed src="{{ asset('storage/' . $docProfile[0]->curriculum_vitae) }}" id="curriculum_preview"
                            width="600" height="500" alt="pdf-curriculum" />
                    </div>
                @else
                    <div>
                        <p>No CV Uploaded</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-2 offset-md-5 mb-3">
                <a class="btn btn-warning w-100" href="{{ route('docProfile.edit', $docProfile[0]->id) }}">Edit
                    Profile</a>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-md-5 mb-3">
                <form action="{{ route('docProfile.destroy', $docProfile[0]->id) }}" method="POST" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger delete-btn w-100">
                        Eliminate Profile
                    </button>
                </form>
                @include('partials.delete-modal')
            </div>
        </div>

    </div>
@endsection
