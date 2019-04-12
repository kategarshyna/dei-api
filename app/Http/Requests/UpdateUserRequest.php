<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  string $password
 */
class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => 'string'
        ];
    }
}
