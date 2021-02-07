<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true; // false から変更
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // IDを取得
        $id = $this -> user -> id;
        return [
            'img' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|max:50',
            'email' => 'email|unique:users,email,' . $id, // $user->id を 変更
            'password' => 'sometimes|nullable|min:6',
            'division_id' => 'required',
        ];
    }
}
