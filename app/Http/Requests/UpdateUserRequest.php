<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  integer $user_id
 * @property  string $password
 */
class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id'  => 'integer',
            'password' => 'string'
        ];
    }
}
