<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocProfileRequest extends FormRequest
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

            'curriculum_vitae' => ['nullable', 'max:255'],
            'photo' => ['nullable', 'image', 'max:512'],
            'studio_address' => ['nullable', 'max:255'],
            'tel' => ['nullable', 'max:20'],
            'services' => ['nullable'],
            'user_id' => ['nullable', 'exists:users,id'],


        ];
    }
}
