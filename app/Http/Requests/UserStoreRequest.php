<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'min:3|max:15|required',
            'last_name' => 'min:3|max:15|required',
            'email'     => 'required|email:dns,rfc|unique:users,email',
            'password'  => 'required|min:8|max:50',
            'country_id'    => 'required|exists:countries,id'
        ];
    }
}
