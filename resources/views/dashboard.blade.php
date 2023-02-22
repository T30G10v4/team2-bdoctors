@extends('layouts.navigation')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <title>Document</title>
    </head>

    <body>
        <div class="container-fluid overflow-hidden p-3">

            {{-- messaggio per comunicare avvenuta creazione tramite funzione with() --}}
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif


            <div class="row">
                <div class="col-lg-4 col-md-12 pb-3">
                    <div class="bg-dark rounded-4 p-3 text-light">
                        Welcome to your Dashboard!<br>
                        First of all you need to create your own Profile. To do that you must click Create Profile on the
                        left sidebar.
                        You can create an empty profile, we suggest to add your own data to be easy discovered. You can add
                        your telephone
                        number, your studio address, your specializations, your photo and cv. Once you do that, you can
                        receive message and
                        mails from your patiens and their reviews. You can see your message and reviews in the proper
                        section by clicking
                        on Messages and Reviews on the left sidebar.
                        A patient can review you with a vote from 1 to 5.
                        You can more discovered more reviews and score you receive, so do a great work!<br>
                        You can see your own statistics on the section Statistics to see messages and reviews received by
                        day
                        You can buy a sponsorship to be in the first positions. To do that you can click in the Sponsorship
                        section.
                        We hope you can improve your own business by using BDoctors!
                    </div>
                </div>
                @if ($thereIsProfile !== null)
                    <div class="col-lg-4 col-md-12 pb-3">

                        <div class="bg-primary rounded-4 p-3 text-light">
                            <h4>Last 3 messages</h4>
                            <table class="table table-dark">
                                <thead>
                                    <tr>

                                        <th scope="col">Mail</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td>{{ $message->mail }}</td>

                                            <td><a class="btn btn-primary"
                                                    href="{{ route('messages.show', $message->id) }}">Show</a></td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <h4>Last 3 reviews</h4>
                            <table class="table table-dark">
                                <thead>
                                    <tr>

                                        <th scope="col">Vote</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $review->vote }}</td>

                                            <td><a class="btn btn-primary"
                                                    href="{{ route('reviews.show', $review->id) }}">Show</a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                <div class="col-lg-4 col-md-12">

                    @if ($thereIsProfile)
                        @if ($docProfile[0]->sponsorized)
                            <div class="rounded-4 p-3 bg-dark " style="color: gold">
                                You're actually sponsorized.
                            @else
                                <div class="bg-dark rounded-4 p-3 text-light">
                                    You're actually non sponsorized.
                        @endif
                    @endif
                </div>
            </div>


        </div>
        </div>
    </body>

    </html>
@endsection
