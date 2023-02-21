<?php

namespace App\Http\Controllers;

use App\Models\DocProfile;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoController extends Controller
{
    public function index()
    {
        $docProfile = DocProfile::where('user_id', '=', Auth::id())->get();
        $promos = Promo::all();
        $collectionDocProfile = 1;

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }

        return view('docProfile.sponsorships.index', compact('promos', 'docProfile', 'thereIsProfile', 'collectionDocProfile'));
    }

    public function show(Promo $promo)
    {
        $docProfile = DocProfile::where('user_id', '=', Auth::id())->get();
        $collectionDocProfile = 1;

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }

        return view('docProfile.sponsorships.show', compact('promo', 'docProfile', 'thereIsProfile', 'collectionDocProfile'));
    }
}
