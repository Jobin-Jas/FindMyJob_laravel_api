<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'headline' =>'required',
            'country' => 'required|string',
            'location' => 'required|string',
            'profile_picture' => 'nullable',
            'cover_picture' => 'nullable',
            'about' => 'nullable'
        ];
    }
}
