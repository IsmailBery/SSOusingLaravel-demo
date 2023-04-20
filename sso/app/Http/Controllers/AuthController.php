<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'getLogin', 'getRegister', 'validate_token']]);
    }

    public function getLogin()
    {
        return view('auth.login');
    }
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }
    public function getRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'package' => $request->package,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        return redirect('http://localhost/service1');
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function user()
    {
        return response()->json(auth()->user());
    }
    protected function respondWithToken($token)
    {
        $authUser = auth()->user();
        $authUser->remember_token = $token;
        $authUser->save();
        return response()->json([
            'access_token' => $token,
            'package' => $authUser->package,
            'remember_token' => $authUser->remember_token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    // Get user from jwt token
    public function validate_token($token)
    {
        $user = User::where('remember_token', $token)->first();
        $auth = auth()->user();

        if(!$auth){
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }else{
            return $auth->package;
            return response()->json([
                'package' => $auth->package
            ]);
        }
    }


}
