<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  string $email
 * @property  string $password md5 hash
 * @property  string $c_password
 * @property  string $user_type A - for Admin, C - for Customer
 * @property  string $status A for Active, D for Disabled, H for Hidden
 * @property  string $lastname
 * @property  string $firstname
 * @property  string $company_name
 * @property  string $company
 */
class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'      => 'required|email|unique:users',
            'password'   => 'required|string',
            'c_password' => 'required|same:password',
            'user_type' => 'required|in:C,A',
            'status' => 'required|in:A,D,H',
            'lastname' => 'string',
            'firstname' => 'string',
            'company_name' => 'string',
            'company' => 'string',
        ];
    }
}
