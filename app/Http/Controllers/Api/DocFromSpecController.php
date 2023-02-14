<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocFromSpecController extends Controller
{
    public function show($id)
    {

        $jsonData = ['success' => true, 'doctors' => []];

        $specializations = DB::table('doc_profile_specialization')
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



        array_push($jsonData, $specializations);

        return response()->json($jsonData);
    }
}
