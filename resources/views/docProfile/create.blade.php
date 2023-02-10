@extends('layouts.doc_admin')

@section('content')
    <div class="container text-light">
        <h2 class="text-center">Create Profile</h2>
        <div class="row justify-content-center">
            <div class="col-8">

                <form action="{{ route('docProfile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="studio_address">Studio Address</label>
                        <input type="text" id="studio_address" name="studio_address" class="form-control"
                            value="{{ old('studio_address') }}">
                    </div>

                    <div class="mb-3">
                        <label for="tel">Telephone</label>
                        <input type="tel" id="tel" name="tel" class="form-control" pattern="[0-9]{9-11}"
                            value="{{ old('tel') }}">
                    </div>

                    <div class="mb-3">
                        <label for="services">Services</label>
                        <textarea name="services" id="services" rows="10" class="form-control">{{ old('services') }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <h4>Specializations</h4>
                        @foreach ($specializations as $specialization)
                            <div class="form-check">
                                {{-- 'value' deve contenere i'id da salvare che alla selezione del checkbox viene salvato tramite il 'name' nell'array collection [specializations], array che è nella tabella ponte profile-specialization (non nella tabella profiles!) --}}
                                <input type="checkbox" name="specializations[]"
                                    id="specialization-{{ $specialization->id }}" class="form-check-input"
                                    value="{{ $specialization->id }}">
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


                    <button class="btn btn-success" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
