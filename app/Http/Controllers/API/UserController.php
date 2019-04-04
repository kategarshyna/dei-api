<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\CsCartApi\Client;
use App\User;
use Exception;
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

        return [
            'token' => $user->createToken(config('app.name'))->accessToken,
            'user'  => $user
        ];
    }

    public function register(RegisterRequest $request)
    {
        $input             = $request->all();
        $input['password'] = bcrypt($input['password']);
        /** @var User $user */
        $user = User::create($input);

        return [
            'token' => $user->createToken(config('app.name'))->accessToken,
            'user'  => $user
        ];
    }

    public function show(Client $client)
    {
        /** @var User $user */
        $user = Auth::user();

        $user = $client->usersEndpoint->show($user->id);

        return $user;
    }


    public function update(Client $client, UpdateUserRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $request->password = md5($request->password);

        $user = $client->usersEndpoint->update($user->id, $request->all());

        return $user;
    }
}
