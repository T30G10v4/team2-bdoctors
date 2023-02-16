@extends('layouts.navigation')

@section('content')
    <div class="container">
        <h2 class="text-center">Edit Profile</h2>
        <div class="row justify-content-center">
            <div class="col-8">

                @include('partials.errors')

                <form action="{{ route('docProfile.update', $docProfile->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="studio_address">Update Studio Address</label>
                        <input type="text" id="studio_address" name="studio_address"
                            value="{{ old('studio_address', $docProfile->studio_address) }}"
                            class="form-control @error('studio_address') is-invalid @enderror">
                        @error('studio_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tel">Update Telephone</label>
                        <input type="text" id="tel" name="tel" value="{{ old('tel', $docProfile->tel) }}"
                            class="form-control @error('tel') is-invalid @enderror">
                        @error('tel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="services">Update Services</label>
                        <textarea name="services" id="services" rows="10" class="form-control">{{ old('services', $docProfile->services) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <h4>Update Specializations</h4>
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
                        <label for="photo">Update Photo</label>
                        <input type="file" name="photo" id="photo"
                            class="form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- anteprima immagine che si aggiorna tramite attributo id collegato ad app.js --}}
                        <div class="mt-3">
                            <img src="{{ asset('storage/' . $docProfile->photo) }}" id="image_preview"
                                class="photo_preview_edit" alt="" style="max-width:300px">
                        </div>
                    </div>

                    {{-- CURRICULA --}}
                    <div class="form-group mb-3">
                        <label for="curriculum_vitae">Update Curriculum Vitae</label>
                        <input type="file" name="curriculum_vitae" id="curriculum_vitae"
                            class="form-control @error('curriculum_vitae') is-invalid @enderror">
                        @error('curriculum_vitae')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- anteprima curriculum che si aggiorna tramite attributo id collegato ad app.js --}}
                    <div class="mt-3 cv_edit">
                        <embed src="{{ asset('storage/' . $curriculumProfile) }}" id="curriculum_preview" width="600"
                            height="500" alt="pdf-curriculum" />
                    </div>


                    <button class="btn btn-warning" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
