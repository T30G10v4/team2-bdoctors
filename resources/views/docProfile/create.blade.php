@extends('layouts.doc_admin')

@section('content')
    {{-- <div class="container">
        <h2 class="text-center">Create Profile</h2>
        <div class="row justify-content-center">
            <div class="col-8">

                <form action="{{ route('docProfile.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="type">Tipology</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">Select</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="10" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
