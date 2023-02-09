@extends('layouts.doc_admin')

@section('content')
    <div class="container text-light">
        <h2 class="text-center">Edit Profile</h2>
        <div class="row justify-content-center">
            <div class="col-8">

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
                        <input type="tel" id="tel" name="tel" class="form-control" pattern="[0-9]{9-11}"
                            value="{{ old('tel', $docProfile->tel) }}">
                    </div>

                    <div class="mb-3">
                        <label for="services">Services</label>
                        <textarea name="services" id="services" rows="10" class="form-control">{{ old('services', $docProfile->services) }}</textarea>
                    </div>
                    <button class="btn btn-warning" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
