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

        $form_data = $request->validated();

        $message = new Message();
        $message->doc_profile_id = $id;
        $message->username = $request->input('messageUsername');
        $message->slug = DocProfile::generateSlug($message->username, '-');
        $message->mail = $request->input('messageMail');
        $message->text = $request->input('messageText');

        $message->save();
    }
}
