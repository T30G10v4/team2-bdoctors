<?php

namespace App\Http\Controllers;

use App\Models\DocProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
        $docProfile = DocProfile::where('user_id', '=', $userId)->get();

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }

        $collectionDocProfile = 1;

        return view('dashboard', compact('docProfile', 'thereIsProfile', 'collectionDocProfile'));
    }
}
