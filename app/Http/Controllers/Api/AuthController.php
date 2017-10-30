<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = \JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function logout(){
        try{
            \JWTAuth::invalidate();
        }catch (JWTException $ex){
            return response()->json(['error' => 'could_not_invalidate_token'],500);
        }
        return response()->json([],204);
    }

    public function refreshToken(Request $request){
        try{
            $bearerToken = \JWTAuth::setRequest($request)->getToken();
            $token = \JWTAuth::refresh($bearerToken);
        }catch (JWTException $ex){
            return response()->json(['error' => 'could_not_refresh_token'],500);
        }
        return response()->json(compact('token'));
    }
}
