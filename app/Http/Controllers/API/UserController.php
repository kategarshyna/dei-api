<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $success = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ( ! $success) {
            throw new UnauthorizedHttpException('Unauthorised');
        }

        /** @var User $user */
        $user = Auth::user();

        return ['token' => $user->createToken('MyApp')->accessToken];
    }

    public function register(RegisterRequest $request)
    {
        $input             = $request->all();
        $input['password'] = bcrypt($input['password']);
        /** @var User $user */
        $user = User::create($input);

        return [
            'token' => $user->createToken('MyApp')->accessToken,
            'user'  => $user
        ];
    }

    public function details()
    {
        $user = Auth::user();

        return ['user' => $user];
    }
}
