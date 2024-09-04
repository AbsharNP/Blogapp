<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session as FacadesSession;



class AuthController extends Controller
{
    public  function login(){

        return view('login');
        
    }
    
    public  function signup(){

        return view('signup');
        
    }

    public function loginPost(Request $request)
    {
        $request->validate([ 
            'email'=>'required|email',  
            'password'=>'required' 
        ]);
        $credentials  = $request->only('email', 'password');
        
        if(Auth::attempt($credentials))
        {

            $user = Auth::user();
            $userName = $user->name;
            Log::info('logged in  user',[$userName]);

            
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
               
            ]);
            return view('home');
        }
        return redirect(route('login'))->with('error','Invalid Email or Password!');
    }
        
    public function signuppost(Request $request)
    {
        $request->validate([ 
            'name'=>'required|min:3',  
            'email'=>'required|unique:users,email|max:50',
            'password'=>'required|min:8'
            
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;

        $user = User::create($data);

        if(!$user){

            return redirect(route('signup'))->with('error',' signup unsuccesfull,try again');
        }
        return redirect(route('login'))->with('success',' sigin succesfull');

    }
    public function logout()
    {
        // Session::flush();
        Auth::logout();
        return redirect('/');
    }
    
}
