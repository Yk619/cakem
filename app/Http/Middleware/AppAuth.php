<?php

namespace App\Http\Middleware;

use App\Models\{User};
use JWT\Token;
use Closure;

class AppAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty($request->header('Authorization'))){ 

            return response()->json(['error_description'=>'Token is empty','error'=>'token_empty'], 404);
        }
        try {

            $userObj = new User();

            $apiToken = $userObj->tokenValidate($request->header('Authorization'));

            $user = User::where('token', $request->header('Authorization'))->first();

            if(!$user){
                return response()->json(['message'=>'Your session has been expired','error'=>'sessionExpired'], 401);
            }

            if ($user->is_deactivated == '1') {
                $response['message'] = "Your account has been deleted by admin.";
                return response()->json($response, 401);
            }
            if ($user->status == '1' || $user->status == '2') {
                $response['message'] = ($user->status == '1') ? "Your account is not active. Please contact administrator." : "Your account has been blocked by admin. Please contact administrator.";
                return response()->json($response, 401); 
            }

            \Auth::setUser($user);

            return $next($request);

        } catch (\Exception $e) {

            return response()->json(['message'=>'Your session has been expired','error'=>'sessionExpired'], 401);
        }

    }
}
