<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'id' => 'required|integer',
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'telephone' => 'required|integer|digits_between:0,20',
            'email' => 'nullable|string|max:255',
            'role' => 'required|integer|max:1',
        ];
    }

    public function attributes()
    {
        return [
            'prenom' => 'prénom ',
            'telephone' => 'téléphone',
            'email' => 'E-mail'
        ];
    }
}
