<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\DocProfile;
use App\Models\Message;
use Illuminate\Http\Request;

class SaveMessageController extends Controller
{
    public function store(StoreMessageRequest $request, $id)
    {

        $doc_profile = DocProfile::find($id);

        $form_data = $request->validated();

        $message = new Message();
        $message->doc_profile_id = $doc_profile->id;
        $message->username = $request->input('messageUsername');
        $message->slug = DocProfile::generateSlug($message->username, '-');
        $message->mail = $request->input('messageMail');
        $message->text = $request->input('messageText');

        try {
            $message->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
