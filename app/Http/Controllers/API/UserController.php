<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\CsCartApi\Client;
use App\Models\CsCartApi\Models\CsCartUser;
use App\User;
use Exception;
use Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserController extends Controller
{
    public function login(Client $client, LoginRequest $request)
    {
        /** @var CsCartUser $userResponse */
        $userResponse = $client->usersEndpoint->auth($request->all());

        if ($userResponse->auth) {
            /** @var User $user */
            if (!$user = User::query()->where(['email' => $userResponse->email])->first()) {
                $user = User::query()->create($userResponse->toArray());
            }

            return [
                'token' => $user->createToken(config('app.name'))->accessToken,
                'user' => $user
            ];
        }

        throw new UnauthorizedHttpException('Unauthorised');
    }

    public function register(Client $client, RegisterRequest $request)
    {
        /** @var CsCartUser $userResponse */
        $userResponse = $client->usersEndpoint->create([
            'email' => $request->email,
            'password' => md5($request->password),
            'user_type' => $request->user_type,
            'status' => $request->status,
            'company_id' => 0,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'company_name' => $request->company_name,
            'company' => $request->company
        ]);

        if (isset($userResponse->user_id) && !empty($userResponse->user_id)) {
            /** @var User $user */
            if (!$user = User::query()->where(['email' => $userResponse->email])->first()) {
                $user = User::query()->create($userResponse->toArray() + ['email' => $request->email]);
            }

            return [
                'token' => $user->createToken(config('app.name'))->accessToken,
                'user' => $user
            ];
        }

        throw new UnauthorizedHttpException('Unauthorised');
    }

    public function show(Client $client)
    {
        /** @var User $user */
        $user = Auth::user();

        $user = $client->usersEndpoint->show($user->user_id);

        return $user;
    }


    public function update(Client $client, UpdateUserRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $user = $client->usersEndpoint->update($user->user_id, ['password' => md5($request->password)]);

        return $user;
    }
}
