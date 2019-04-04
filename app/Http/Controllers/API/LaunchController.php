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

class LaunchController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        return [
            'token' => $user->createToken('MyApp')->accessToken,
            'user'  => $user
        ];
    }
}
