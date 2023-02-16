<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class SaveMessageController extends Controller
{
    public function store(StoreMessageRequest $request, $id)
    {

        $form_data = $request->validated();

        $message = new Message();

        $message->doc_profile_id = $id;
        $message->username = "Pino dei Palazzi";
        $message->slug = "pino-dei-palazzi";
        $message->mail = "canesecco@gmail.com";
        $message->text = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste quo ullam voluptatum quam laboriosam fugiat id et? Explicabo quasi obcaecati tempora fugit ipsam? Obcaecati dolor corporis dolorum vitae sequi architecto?";

        $message->save();
    }
}
