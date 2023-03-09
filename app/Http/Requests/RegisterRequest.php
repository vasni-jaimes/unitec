<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'             => 'required|max:50|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'last_name'        => 'required|max:50|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'mother_last_name' => 'required|max:50|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'gender'           => 'required|numeric|exists:genders,id',
            'age'              => 'required|numeric|min:18|max:80',
            'marital_status'   => 'required|numeric|exists:marital_statuses,id',
            'education_level'  => 'required|numeric|exists:educational_levels,id',
            'career'           => 'exclude_if:education_level,1|numeric|exists:careers,id',
            'email'            => 'required|email|max:50|unique:users,email',
            'password'         => 'required|min:8|max:50'
        ];
    }
}
