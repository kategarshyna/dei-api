<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  string $email
 * @property  string $password
 * @property  string $c_password
 * @property  string $name
 */
class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'       => 'required|string',
            'email'      => 'required|email',
            'password'   => 'required|string',
            'c_password' => 'required|same:password',
        ];
    }
}
