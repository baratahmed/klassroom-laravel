<?php

namespace App\Http\Controllers\Frontend;

use Session;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        $data = [];
        $data['articles'] = cache()->get('articles', function(){
            return Post::with('user','category')->orderBy('id','desc')->take(20)->get();
        });
        return view('index',$data);
    }

    public function post(){
        $data = [];
        return view('post',$data);
    }

    public function verifyEmail($token = null){

        if ($token == null) {
            Session::flash('error','Invalid Token!!!');
            return redirect()->route('login');
        }
        $user = User::where('email_verification_token',$token)->first();
        if ($user == null) {
            Session::flash('error','Invalid Token!!!');
            return redirect()->route('login');
        } 
        
        $user->email_verified = 1;
        $user->email_verified_at = now();
        $user->email_verification_token = '';
        $user->save();

        // $user->update([
        //     'email_verified' => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'email_verification_token' => '',            
        // ]);
        

        Session::flash('success','Your account is activated. You can login now!!!');
        return redirect()->route('login');
    }

    public function lastLoginSetDate(){

        $allUsers = User::all();
        foreach ($allUsers as $user) {
            $user->last_login  = \Carbon\Carbon::now();
            $user->save();
        }
        return 'Done';
    }
    
}
