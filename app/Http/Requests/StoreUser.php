<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'img' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|max:50',
            'email' => 'email|unique:users',
            'password' => 'required|min:6',
            'division_id' => 'required',
        ];
    }
}
