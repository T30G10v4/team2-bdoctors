<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\DocProfile;
use App\Models\Promo;
use App\Models\User;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request, Gateway $gateway)
    {
        $docProfile = DocProfile::where('user_id', '=', Auth::id())->get();
        $promos = Promo::all();
        $collectionDocProfile = 1;

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }

        $token = $gateway->clientToken()->generate();
        // $data = [
        //     'success' => true,
        //     'token' => $token,
        // ];
        // return response()->json($data, 200);
        return view('docProfile.sponsorships.index', compact('token', 'promos', 'docProfile', 'thereIsProfile', 'collectionDocProfile'));
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => "Transaction completed successfully"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transaction failed"
            ];
            return response()->json($data, 401);
        }

        return redirect()->route('docProfile.sponsorships.show');
    }
}
