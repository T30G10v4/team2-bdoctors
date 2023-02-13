<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DocProfile;
use App\Models\User;
use Illuminate\Http\Request;

class DocProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        $results = [];
        foreach ($users as $user) {
            $docProfile = DocProfile::where('user_id', '=', $user->id)->get();
            $userDoc = array_merge($docProfile, $user);

            array_push($results, $userDoc);
        }




        return response()->json([
            'success' => true,
            'results' => $results,


        ]);
    }
}
