<?php

namespace App\Http\Controllers;

use App\Models\DocProfile;
use App\Models\Message;
use App\Models\Review;
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

        if ($thereIsProfile) {
            $messages = Message::where('doc_profile_id', $docProfile[0]->id)->orderBy('created_at', 'DESC')->limit(3)->get();
            $reviews = Review::where('doc_profile_id', $docProfile[0]->id)->orderBy('created_at', 'DESC')->limit(3)->get();
        } else {
            $messages = "";
            $reviews = "";
        }
        $collectionDocProfile = 1;
        return view('dashboard', compact('docProfile', 'thereIsProfile', 'collectionDocProfile', 'messages', 'reviews'));
    }
}
