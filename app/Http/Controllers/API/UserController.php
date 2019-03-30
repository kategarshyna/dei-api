<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserController extends Controller
{
    public function login()
    {
        $success = Auth::attempt(['email' => request('email'), 'password' => request('password')]);

        if (!$success) {
            throw new UnauthorizedHttpException('Unauthorised');
        }

        /** @var User $user */
        $user = Auth::user();
        $success['token'] =  $user->createToken('MyApp')-> accessToken;

        return ['success' => $success];
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            throw new UnauthorizedHttpException($validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        /** @var User $user */
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;

        return ['success'=>$success];
    }

    public function details()
    {
        $user = Auth::user();
        
        return ['success' => $user];
    }
}
