<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['max:255', 'required', 'regex:/^[a-zA-Z]+$/u'],

            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'surname' => ['max:50', 'required', 'alpha'],
            'address' => ['string', 'max:255'],
            'specialization' => ['string', 'max:50'],

        ];
    }

    public function messages()
    {
        return [
            'name.regex:/^[a-zA-Z]+$/u' => 'Name must have only letters',
            'surname.alpha' => 'surname must have only letters',

        ];
    }
}
