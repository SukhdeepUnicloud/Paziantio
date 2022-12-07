<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Mail;
use App\Mail\MailOtp;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function update_status(Request $request,$id)
    {
        $users = User::find($id);
        $users->name = 'statusok';
        $users->save();
        return response()->json($users);

    }
   

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->two_factor == 1 && auth()->user()->user_status == 1) {
                $userEmail = auth()->user()->email;
                $code = rand(000000, 999999);
                User::where('email', '=', $userEmail)->update([
                    'email_otp' => $code,
                    'email_otp_status' => '0'
                ]);

                $body = [
                    'email_otp' => $code
                ];

                Mail::to($userEmail)->send(new MailOtp($body));

                $success = true;
                $message = "User Login Successfully";

                $response = [

                    'success' => $success,
                    'message' => $message,
                    'two_factor_auth' => auth()->user()->two_factor,
                    'user_status' => auth()->user()->user_status

                ];

                return response()->json($response, 201);
            } else if (auth()->user()->two_factor == 0 && auth()->user()->user_status == 1) {
                $success = true;
                $message = "User Login Successfully";

                $response = [

                    'success' => $success,
                    'message' => $message,
                    'two_factor_auth' => auth()->user()->two_factor,
                    'user' => auth()->user()->name,
                    'role' => auth()->user()->role,
                    'user_status' => auth()->user()->user_status

                ];

                return response()->json($response, 200);
            }
        } else {
            throw ValidationException::withMessages([
                'error' => ['The provided credentials are incorrect']
            ]);
        }
    }

    public function verify_otp()
    {
        return view('auth.two_factor');
    }
    public function verify_email($email)
    {
        $users = User::find($email);
        return response()->json($users);

    }
}
