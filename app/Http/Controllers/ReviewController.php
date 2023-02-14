<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\DocProfile;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $docProfile = DocProfile::where('user_id', '=', Auth::id())->get();

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }


        foreach ($docProfile as $single) {
            $reviews = Review::where('doc_profile_id', '=', $single->id)->get();
        }

        $collectionDocProfile = 1;

        // tutti i messaggi che hanno doc_profile_id = id di docProfile
        return view('docProfile.reviews.index', compact('reviews', 'docProfile', 'thereIsProfile', 'collectionDocProfile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $docProfile = DocProfile::where('user_id', '=', Auth::id())->get();

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }

        $collectionDocProfile = 1;

        return view('docProfile.reviews.show', compact('review', 'docProfile', 'thereIsProfile', 'collectionDocProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
