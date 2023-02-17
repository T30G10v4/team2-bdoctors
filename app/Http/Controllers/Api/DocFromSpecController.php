<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\countOf;

class DocFromSpecController extends Controller
{
    public function show($id)
    {

        $docsForSpecs = DB::table('doc_profile_specialization')
            ->join('doc_profiles', 'doc_profile_specialization.doc_profile_id', '=', 'doc_profiles.id')
            ->join('users', 'doc_profiles.user_id', '=', 'users.id')
            ->select(
                'users.name',
                'users.surname',
                'doc_profiles.id',
                'doc_profiles.curriculum_vitae',
                'doc_profiles.photo',
                'doc_profiles.studio_address',
                'doc_profiles.tel',
                'doc_profiles.services',
                'doc_profiles.slug',

            )

            ->where('specialization_id', '=', $id)
            ->get();


        foreach ($docsForSpecs as $doc) {
            $sumVote = 0;
            $numVote = 0;

            $reviewsForDoc = DB::table('reviews')
                ->select('reviews.vote')
                ->where('reviews.doc_profile_id', $doc->id)
                ->get();


            foreach ($reviewsForDoc as $revForDoc) {
                $sumVote = $sumVote + $revForDoc->vote;
                $numVote += 1;
            }
            if ($numVote !== 0) {
                $mediaVote = $sumVote / $numVote;
                $mediaVote = round($mediaVote, 1);
            } else {
                $mediaVote = 0;
            }

            $doc->sponsorized = (bool)rand(0, 1);
            $doc->numReviews = $numVote;
            $doc->mediaVote = $mediaVote;
        }

        return response()->json($docsForSpecs);
    }
}
