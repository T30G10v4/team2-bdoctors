<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DocProfile;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class DocProfileController extends Controller
{
    public function index()
    {

        $jsonData = ['success' => true, 'doctors' => ['specializations' => []]];

        $users = User::all();

        foreach ($users as $user) {

            $docProfile = DocProfile::where('user_id', '=', $user->id)->get();


            $thereIsProfile = null;
            foreach ($docProfile as $item) {
                $thereIsProfile = $item->id;
            }

            if ($thereIsProfile) {
                $jsonData['doctors'][] = [
                    'id' => $user->id,


                    'name' => $user->name,
                    'surname' => $user->surname,
                    'mail' => $user->mail,
                    'specialization' => $user->specialization,

                    'profile_id' => $docProfile[0]->id,
                    'curriculum_vitae' => $docProfile[0]->curriculum_vitae,
                    'photo' => $docProfile[0]->photo,
                    'studio_address' => $docProfile[0]->studio_address,
                    'tel' => $docProfile[0]->tel,
                    'services' => $docProfile[0]->services,
                    'slug' => $docProfile[0]->slug,

                ];
            } else {
                $jsonData['doctors'][] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'mail' => $user->mail,
                    'specialization' => $user->specialization,
                    'profile_id' => NULL,
                ];
            }
        }

        return response()->json($jsonData);
    }
}
