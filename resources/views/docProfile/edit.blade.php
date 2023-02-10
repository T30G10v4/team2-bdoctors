@extends('layouts.doc_admin')

@section('content')
    <div class="container text-light">
        <h2 class="text-center">Edit Profile</h2>
        <div class="row justify-content-center">
            <div class="col-8">

                @include('partials.errors')

                <form action="{{ route('docProfile.update', $docProfile->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="studio_address">Studio Address</label>
                        <input type="text" id="studio_address" name="studio_address" class="form-control"
                            value="{{ old('studio_address', $docProfile->studio_address) }}">
                    </div>

                    <div class="mb-3">
                        <label for="tel">Telephone</label>
                        <input type="text" id="tel" name="tel" class="form-control"
                            value="{{ old('tel', $docProfile->tel) }}">
                        @error('tel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="services">Services</label>
                        <textarea name="services" id="services" rows="10" class="form-control">{{ old('services', $docProfile->services) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <h4>Specializations</h4>
                        @foreach ($specializations as $specialization)
                            <div class="form-check">

                                <input type="checkbox" name="specializations[]"
                                    id="specialization-{{ $specialization->id }}" class="form-check-input"
                                    value="{{ $specialization->id }}" @checked(
                                        $errors->any()
                                            ? in_array($specialization->id, old('specializations', []))
                                            : $docProfile->specializations->contains($specialization))>
                                <label for="specialization-{{ $specialization->id }}"
                                    class="form-check-label">{{ $specialization->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <button class="btn btn-warning" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
