<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use App\Notifications\NotifyAdmin;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showRegistrationForm(){ 
        return view('register');
    }

    public function processRegistration(Request $request){

        $this->validate($request,[
            'full_name' => 'required',
            'email' => 'bail|required|email|unique:users,email',
            'phone_number' => 'bail|required|min:6|max:15|unique:users,phone_number',
            'password' => 'bail|required|min:6|confirmed',
            'photo' => 'bail|required|image|max:10240', //10240kB Or 10MB
        ]);

        // if ($request->has('photo')) {
        //     $photo = $request->file('photo');
        //     $fileName = uniqid('IMG_',true).'_'.Str::random(10).'.'.$photo->getClientOriginalExtension();

        //     if ($photo->isValid()) {
        //         $photo->storeAs('images',$fileName);
        //     }
        // }

        // $data = [
        //     'full_name' => $request->full_name,
        //     'email' => strtolower($request->email),
        //     'phone_number' => $request->phone_number,
        //     'password' => bcrypt($request->password),
        //     'photo' => '/uploads/images/'.$fileName,
        // ];
        
        // User::create($data); 
        // return 'Success';

        

        try {    
            if ($request->has('photo')) {
                $photo = $request->file('photo');
                $fileName = uniqid('IMG_',true).'_'.Str::random(10).'.'.$photo->getClientOriginalExtension();
    
                if ($photo->isValid()) {
                    $photo->storeAs('images',$fileName);
                }

                $user = new User();
                $user->full_name = trim($request->full_name);
                $user->email = strtolower(trim($request->email));
                $user->phone_number = $request->phone_number;
                $user->password = bcrypt($request->password);
                $user->photo = '/uploads/images/'.$fileName;
                $user->email_verification_token = Str::random(32);
                $user->save();
            } else{
                $user = new User();
                $user->full_name = $request->full_name;
                $user->email = strtolower($request->email);
                $user->phone_number = $request->phone_number;
                $user->password = bcrypt($request->password);
                $user->email_verification_token = Str::random(32);
                $user->save();
            }   

            // Mail::to($user->email)->queue(new VerificationEmail($user));

            $user->notify(new VerifyEmail($user));

            $admin = User::find(1);

            $admin->notify(new NotifyAdmin($user));

            Session::flash('success','Your account has been created. Verify your account!!');
            return redirect()->route('login');
        } catch (\Exception $e) {
            Session::flash('error',$e->getMessage());
            return redirect()->back();            
        }

    }

    public function showLoginForm(){ 
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function processLogin(Request $request){
        
        $this->validate($request,[
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6',
        ]);

        $credentials =  $request->except(['_token']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ( $user->email_verified == 0) {
                auth()->logout();
                Session::flash('error','You account is not activated. Please verify your email.');
                return redirect()->route('login');

            }

            $user->last_login = Carbon::now();
            $user->save();

            Session::flash('success','You are logged in Successfully!!!');
            return redirect()->route('dashboard');
        }else{
            Session::flash('error','Your credentials are not correct!!!');
            return redirect()->back();
        }        


    }
    public function dashboard(){ 
        return view('backend.dashboard');
    }
    public function showProfile(){ 
        return 'Profile';
    }
    public function logout(){ 
        auth()->logout();
        Session::flash('success','You has been logged out!!!');
        return redirect()->route('home');

    }
}
