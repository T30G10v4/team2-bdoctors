<?php

namespace App\Http\Controllers;

use App\Models\DocProfile;
use App\Models\Message;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {

        $userId = Auth::id();
        $docProfile = DocProfile::where('user_id', '=', $userId)->get();

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }

        $collectionDocProfile = 1;

        foreach ($docProfile as $item) {
            $docId = $item->id;
        }
        //selection of message 
        $recordMessage = Message::select(FacadesDB::raw("COUNT(*) as count"), FacadesDB::raw("DAYNAME(created_at) as day_name"), FacadesDB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->where('doc_profile_id', '=', $docId)
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();

        $dataMessage = [];

        foreach ($recordMessage as $row) {
            $dataMessage['labelMessage'][] = $row->day_name;
            $dataMessage['dataMessage'][] = (int) $row->count;
        }

        $dataMessage['chart_dataMessage'] = json_encode($dataMessage);

        //selection review
        $recordReview = Review::select(FacadesDB::raw("COUNT(*) as count"), FacadesDB::raw("DAYNAME(created_at) as day_name"), FacadesDB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->where('doc_profile_id', '=', $docId)
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();

        $dataReview = [];

        foreach ($recordReview as $row) {
            $dataReview['labelReview'][] = $row->day_name;
            $dataReview['dataReview'][] = (int) $row->count;
        }

        $dataReview['chart_dataReview'] = json_encode($dataReview);

        return view(
            'docProfile.chartJs.chart',
            //'dashboard',
            [
                'thereIsProfile' => $thereIsProfile,
                'dataMessage' => $dataMessage,
                'dataReview' => $dataReview,
                'docProfile' => $docProfile,
                'collectionDocProfile' => $collectionDocProfile
            ]
        );
    }
}
