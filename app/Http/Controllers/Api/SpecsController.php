<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecsController extends Controller
{
    public function index()
    {
        $jsonData = ['success' => true, 'specs' => []];
        $specs = DB::table('specializations')->select('specializations.name', 'specializations.id')->get();

        array_push($jsonData['specs'], $specs);


        return response()->json($jsonData);
    }
}
