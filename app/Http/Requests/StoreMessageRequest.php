<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'doc_profile_id' => ['numeric'],
            'username' => ['max:255'],
            'mail' => ['email', 'regex:/(.+)@(.+).(.+)/i'],
            'text' => ['text']
        ];
    }
}
