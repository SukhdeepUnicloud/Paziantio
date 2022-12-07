<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ResetPassword;
use Mail;
use DB;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{

    public function success_password()
    {
         return   view('auth.passwords.success');
        
    }

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SUCCESS_PASSWORD;

    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);
                  
          $body = [
            'email'=>$request->email,
            'token'=>$token

        ];
            Mail::to($request->email)->send(new ResetPassword($body));
   
        return response()->json('We have e-mailed your password reset link!');
  

  
    }

   
}
