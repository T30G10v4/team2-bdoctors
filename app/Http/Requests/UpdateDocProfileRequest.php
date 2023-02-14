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

            'studio_address' => ['nullable', 'max:255'],
            'tel' => ['nullable', 'numeric', 'digits_between:9, 12'],
            'services' => ['nullable'],
            'photo' => ['nullable', 'image', 'max:512'],
            'curriculum_vitae' => ['nullable', 'mimes:pdf', 'max:2048'],
            'user_id' => ['nullable', 'exists:users,id'],
            'specializations' => ['exists:specializations,id'],


        ];
    }

    public function messages()
    {
        return [
            'studio_address.max:255' => 'Studio Address must not exceed 255 characters',
            'tel.numeric' => 'Phone number must be numeric',
            'tel.digits' => 'Phone number must be from 9 to 12',
            'photo.image' => 'Photo must be in the following formats: JPEG, PNG, SVG, GIF, JPG.',
            'photo.max:512' => 'Photo must not exceed 512KB',
            'curriculum_vitae.mimes' => 'Curriculum Vitae must be in PDF format',
            'curriculum_vitae.max:2048' => 'Curriculum Vitae must not exceed 2MB',
        ];
    }
}
