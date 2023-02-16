@extends('layouts.navigation')

@section('content')
    <div class="container">
        <h2 class="text-center">Create Profile</h2>
        <div class="row justify-content-center">
            <div class="col-8">

                @include('partials.errors')

                <form action="{{ route('docProfile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="studio_address">Studio Address</label>
                        <input type="text" id="studio_address" name="studio_address" value="{{ old('studio_address') }}"
                            class="form-control
                            @error('studio_address')
                            is-invalid
                            @enderror">
                        @error('studio_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tel">Telephone</label>
                        <input type="tel" id="tel" name="tel" pattern="[0-9]{9-12}"
                            value="{{ old('tel') }}"
                            class="form-control
                            @error('tel')
                            is-invalid
                            @enderror">
                        @error('tel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="services">Services</label>
                        <textarea name="services" id="services" rows="10" class="form-control">{{ old('services') }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <h4>Specializations</h4>
                        @foreach ($specializations as $specialization)
                            <div class="form-check">

                                <input type="checkbox" name="specializations[]"
                                    id="specialization-{{ $specialization->id }}" class="form-check-input"
                                    value="{{ $specialization->id }}" @checked(in_array($specialization->id, old('specializations', [])))>
                                <label for="specialization-{{ $specialization->id }}"
                                    class="form-check-label">{{ $specialization->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group mb-3">
                        <label for="photo">Image</label>
                        <input type="file" name="photo" id="photo"
                            class="form-control
                            @error('photo')
                            is-invalid
                            @enderror">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- anteprima immagine che si aggiorna tramite attributo id collegato ad app.js --}}
                    <div class="mt-3">
                        <img id="image_preview" src="" alt="" style="max-height: 200px">
                    </div>

                    {{-- CURRICULA --}}
                    <div class="form-group mb-3">
                        <label for="curriculum_vitae">Curriculum Vitae</label>
                        <input type="file" name="curriculum_vitae" id="curriculum_vitae"
                            class="form-control
                            @error('curriculum_vitae')
                            is-invalid
                            @enderror">
                        @error('curriculum_vitae')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- anteprima curriculum che si aggiorna tramite attributo id collegato ad app.js --}}
                    <div class="mt-3 cv_create">
                        <embed src="{{ asset('storage/' . $curriculumProfile) }}" id="curriculum_preview" width="600"
                            height="500" alt="pdf-curriculum" />
                    </div>


                    <button class="btn btn-success" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
