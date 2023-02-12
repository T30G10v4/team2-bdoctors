@extends('layouts.doc_admin')

@section('content')
    <div class="container text-light">
        <h2 class="text-center">Edit Profile</h2>
        <div class="row justify-content-center">
            <div class="col-8">

                @include('partials.errors')

                <form action="{{ route('docProfile.update', $docProfile->id) }}" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group mb-3 ">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">

                        {{-- anteprima immagine che si aggiorna tramite attributo id collegato ad app.js --}}
                        <div class="mt-3">
                            <img src="{{ asset('storage/' . $docProfile->photo) }}" id="image_preview"
                                class="photo_preview_edit" alt="{{ 'Cover image di ' . $docProfile->slug }}"
                                style="max-width:300px">
                        </div>
                    </div>

                    {{-- CURRICULA --}}
                    <div class="form-group mb-3">
                        <label for="curriculum_vitae">Curriculum Vitae</label>
                        <input type="file" name="curriculum_vitae" id="curriculum_vitae"
                            class="curriculum_edit form-control @error('curriculum_vitae') is-invalid @enderror">
                        @error('curriculum_vitae')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- anteprima curriculum che si aggiorna tramite attributo id collegato ad app.js --}}
                    <div class="mt-3">
                        <embed src="{{ asset('storage/' . $curriculumProfile) }}" id="curriculum_preview" width="600"
                            height="500" alt="pdf-curriculum" />
                    </div>


                    <button class="btn btn-warning" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
