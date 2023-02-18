<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class SaveReviewController extends Controller
{
    public function store(StoreReviewRequest $request, $id)
    {

        $form_data = $request->validated();

        $review = new Review();
        $review->doc_profile_id = $id;
        $review->username = $request->input('reviewUsername');
        $review->vote = $request->input('reviewVote');
        $review->text = $request->input('reviewText');

        $review->save();
    }
}
