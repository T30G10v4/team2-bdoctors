<?php

namespace App\Http\Controllers;

use App\Models\DocProfile;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $docProfile = DocProfile::all();
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
        $docProfile = DocProfile::all();
        $collectionDocProfile = 1;

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }

        return view('docProfile.sponsorships.show', compact('promo', 'docProfile', 'thereIsProfile', 'collectionDocProfile'));
    }
}
