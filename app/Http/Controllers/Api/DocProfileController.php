<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DocProfile;
use App\Models\Review;
use App\Models\Specialization;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocProfileController extends Controller
{
    public function index()
    {

        $jsonData = ['success' => true, 'doctors' => []];

        $users = User::all();

        foreach ($users as $user) {

            $docProfile = DocProfile::where('user_id', '=', $user->id)->get();

            $thereIsProfile = null;
            foreach ($docProfile as $item) {
                $thereIsProfile = $item->id;
            }



            if ($thereIsProfile) {

                $specializations = DB::table('specializations')
                    ->join('doc_profile_specialization', 'specializations.id', '=', 'doc_profile_specialization.specialization_id')
                    ->join('doc_profiles', 'doc_profile_specialization.doc_profile_id', '=', 'doc_profiles.id')
                    ->select('specializations.name')->where('doc_profiles.id', '=', $thereIsProfile)
                    ->get();



                $specializationsArray = [];

                $nameSpecialization = Specialization::select('specializations.name')
                    ->where('specializations.id', '=', $user->specialization)
                    ->get();

                array_push($specializationsArray, $nameSpecialization[0]->name);

                foreach ($specializations as $spec) {
                    array_push($specializationsArray, $spec->name);
                }

                $jsonData['doctors'][] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'email' => $user->email,
                    'specialization' => $specializationsArray,

                    'profile_id' => $docProfile[0]->id,
                    'curriculum_vitae' => $docProfile[0]->curriculum_vitae,
                    'photo' => $docProfile[0]->photo,
                    'studio_address' => $docProfile[0]->studio_address,
                    'tel' => $docProfile[0]->tel,
                    'services' => $docProfile[0]->services,
                    'slug' => $docProfile[0]->slug,

                ];
            } else {
                // $jsonData['doctors'][] = [
                //     'id' => $user->id,
                //     'name' => $user->name,
                //     'surname' => $user->surname,
                //     'email' => $user->email,
                //     'specialization' => $user->specialization,
                //     'profile_id' => NULL,
                // ];
            }
        }

        return response()->json($jsonData);
    }

    public function show($slug)
    {

        //$doctor = [];
        $docProfile = DocProfile::where('slug', '=', $slug)->get();
        $user = User::where('id', '=', $docProfile[0]->user_id)->get();


        $specializations = DB::table('specializations')
            ->join('doc_profile_specialization', 'specializations.id', '=', 'doc_profile_specialization.specialization_id')
            ->join('doc_profiles', 'doc_profile_specialization.doc_profile_id', '=', 'doc_profiles.id')
            ->select('specializations.name')->where('doc_profiles.id', '=', $docProfile[0]->id)
            ->get();

        $reviewsCollection = Review::where('doc_profile_id', $docProfile[0]->id)->get();

        $specializationsDocArray = [];
        foreach ($specializations as $spec) {
            array_push($specializationsDocArray, $spec->name);
        }

        //array_merge($doctor, $docProfile[0], $user[0], $specializations);

        $jsonData = ['success' => true, 'doctor' => [

            $user[0],

            $docProfile[0],

            $specializationsDocArray,

            "review" => $reviewsCollection,

        ]];

        return response()->json($jsonData);
    }
}
