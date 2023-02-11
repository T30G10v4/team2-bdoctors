<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

class StoreDocProfileRequest extends FormRequest
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

            'curriculum_vitae' => ['nullable', 'mimes:pdf', 'max:2040'],
            'photo' => ['nullable', 'image', 'max:512'],
            'studio_address' => ['nullable', 'max:255'],
            //'tel' => ['nullable', 'max:20', 'required', 'numeric'],
            'services' => ['nullable'],
            'user_id' => ['nullable', 'exists:users,id'],
            'specializations' => ['exists:specializations,id'],


        ];
    }
}
