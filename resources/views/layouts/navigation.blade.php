<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BDoctors</title>

    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container-fluid text-center">
        <div class="row vh-100">
            <div class="col-md-2 col-sm-12 bg-primary text-white">

                <div class="container-fluid">
                    <div class="row-cols-1 g-2">

                        @include('partials.navigationphoto', ['thereIsProfile', 'docProfile'])

                        <div class="col">
                            <p>Dr. {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
                        </div>
                        {{-- <div class="col">
                            <p>Cardiology</p> Prima specializzazione (da tirare fuori dal db)
                        </div> --}}
                        <div class="col">
                            <p>{{ Auth::user()->email }}</p>
                        </div>

                        <div class="col mb-3">
                            <a class="btn btn-secondary w-100" href="{{ route('dashboard') }}">Dashboard</a>
                        </div>

                        <div class="col mb-3">

                            @if (!$thereIsProfile)
                                <a class="btn btn-secondary w-100" href="{{ route('docProfile.create') }}">Create
                                    Profile</a>
                            @else
                                <a class="btn btn-secondary w-100"
                                    href="{{ route('docProfile.show', $thereIsProfile) }}">Show
                                    Profile</a>
                            @endif
                        </div>
                        @if ($thereIsProfile)
                            <div class="col mb-3">
                                <a class="btn btn-secondary w-100" href="">Sponsorships</a>
                            </div>
                            <div class="col mb-3">
                                <a class="btn btn-secondary w-100" href="{{ route('messages.index') }}">Messages</a>
                            </div>
                            <div class="col mb-3">
                                <a class="btn btn-secondary w-100" href="{{ route('reviews.index') }}">Reviews</a>
                            </div>
                            <div class="col mb-3">
                                <a class="btn btn-secondary w-100" href="{{ route('stats') }}">Statistics</a>
                            </div>
                        @endif
                        <div class="col mb-3">
                            <a class="btn btn-danger w-100" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-md-10 col-sm-12 bg-light">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
