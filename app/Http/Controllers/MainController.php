<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use File;
use DB;
use Carbon\Carbon;
use App\Mail\MailNotify;
use Illuminate\Validation\ValidationException;
use Session;



class MainController extends Controller
{

    // public function unique_user_id()
    // {
    //     $uuid = Str::uuid()->toString();
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('view_profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Adminuser = User::where("id", "=", Auth::user()->id)->get();
        $Adminusers = User::find($id);
        return view('edit_profile', compact('Adminuser', 'Adminusers'));
    }

    public function updateProfile(Request $request, $id)
    {

        $request->validate([

            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'country' => 'required'

        ]);
       $user=User::where('id','=',$id)->first();
       $user->firstname = $request->get('firstname');
       $user->lastname = $request->get('lastname');
       $user->phone = $request->get('phone');
       $user->mobile=$request->get('mobile');
       $user->street = $request->get('street');
       $user->street_no = $request->get('street_no');
       $user->postalcode = $request->get('postalcode');
       $user->city = $request->get('city');
       $user->country = $request->get('country');
       $user->two_factor = $request->get('two_factor');
       if ($request->hasFile('file')) {
        $image = $request->file('file');
        $destination = public_path('assets/app/public/user_profiles/'.$id.'/users/avatar');
        if (!File::isDirectory($destination)) {
            mkdir($destination, 0777, true);
            chmod($destination, 0777);
        }
        $filename = 'image-' . time() . '-' . Str::random(15) . '.' . $image->getClientOriginalExtension();
        $image->move($destination, $filename);
        $user->image = $filename;
 
    }

        
       $user->save();

       return response()->json('Location Update Successfully');
    }

    public function formSubmit(Request $request)
    {
    	$imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        
    	return response()->json(['success'=>'You have successfully upload image.']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function verify_email($email)
    {
        $users = User::find($email);
        return response()->json($users);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function all_user()
    {
        $users = User::where('email', '!=', Auth::user()->email)->get();
        return response()->json($users, 200);
    }
    public function register_user(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required|min:8'

        ]);
        User::create([
            'users_id'=>$uuid,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            

        ]);
        $body = [
        
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
            'url_a' => url('/dashboard')
        ];

        Mail::to($request->email)->send(new MailNotify($body));

        return redirect()->route('all_user');
    }

    public function deleteUser($id)
    {
        $post = User::find($id);
        $post->delete();

        return response()->json('User deleted Successfully');
    }

    public function  otpVerify(Request $request)
    {

        $validated = $request->validate([
            'code_1' => 'required',
            'code_2' => 'required',
            'code_3' => 'required',
            'code_4' => 'required',
            'code_5' => 'required',
            'code_6' => 'required',
        ]);

        $code = $request["code_1"] . "" . $request["code_2"] . "" . $request["code_3"] . "" . $request["code_4"] . "" . $request["code_5"] . "" . $request["code_6"];

        $loggedUseremail = Auth::user()->email;

        $user =  User::select('*')->where('email', $loggedUseremail)
            ->get()->toArray();

        $otp = $user[0]["email_otp"];

        if ($code == $otp) {
            User::where('email', '=', $loggedUseremail)->update([
                'email_otp' => null,
                'email_otp_status' => '1'
            ]);

            $success = true;
            $message = "User Login Successfully";
            $verification = "yes";

            $response = [

                'success' => $success,
                'message' => $message,
                'verification' => $verification

            ];

            return response()->json($response, 200);
        } else {
            throw ValidationException::withMessages([
                'error' => ['You entered wrong OTP']
            ]);
        }
    }

    public function getCurrentLoggedUser()
    {
        $response = [
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'role' => Auth::user()->role,
            'email' => Auth::user()->email 
        ];

        return response()->json($response);
        
    }

    public function getCurrentLoggedUserwithId()
    {
        $user = User::where('id',Auth::user()->id)->get()->toArray();

        $userInfo = $user[0];

        return response()->json($userInfo);
        
    }

    public function deactivateProfile(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'agree' => 'required'
        ]);

        $users = User::where('email',auth()->user()->email)->first();
        if($users){
            if (Hash::check($request->password,$users->password)){
                
                User::where('email', '=', auth()->user()->email)->update([
                    'user_status' => '0', 
                ]);
                Auth::logout();

                $success = true;
                $message = 'Account deactivated successfully';

                $response = [
                    'success' => $success,
                    'message' => $message
                ];

                return response()->json($response,200);
            }
          
            else {
                throw ValidationException::withMessages([
                    'error' => ['Password does not match']
                ]);
            }
           
        }
    }

    public function changeUserStatus($status,$id)
    {

        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);
        User::where('id', '=', $id)->update([
            'user_status' => $status
        ]);

        $success = true;
        $message = 'Account status changed successfully';


       $response = [

        'success' => $success,
        'message' => $message

    ];
    
       return response()->json($response,200);
    }


    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = "Logout Successfully";
        } catch (\Illuminate\Database\QueryException $ex) {

            $success = true;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }
    public function update_password(Request  $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $token = $request->input('token');
        $email = $request->input('email');
        if(DB::table('password_resets')
        ->where('email','=',$email)
        ->where('token','=',$token)
        ->first()) {
        $user = User::where('email','=',$email)->first();
        $user->name = "Don";
        $user->password = Hash::make($request->input('password'));
        $user->update();
        $match = 1;
        return response()->json($match);
        }
        else
        {
            $dont=0;
            return response()->json($dont);
        }
       
    }   
}
