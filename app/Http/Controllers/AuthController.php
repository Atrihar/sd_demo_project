<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
class AuthController extends Controller
{
    public function register(){
        return view('admin.pages.register');
    }
    public function userRegister(Request $req){
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $confirm = $req->cnf_password;
        $role = $req->role;
        if($password == $confirm){
            $user_exists = User::where('email','=',$email)->first();
            if($user_exists){
                return redirect()->back()->with('info', 'User Already Exists');
            }
            else{
                $user = new User();
                $user->name = $name;
                $user->email = $email;
                $user->password = md5($password); // 123456
                $user->role = $role;
                if($user->save()){
                    return redirect()->back()->with('info', 'User registered. Waiting for approval');
                }
            }
        }
        else{
            return redirect()->back()->with('info', 'Password Mismatch');
        }
    }
    public function login(){
        return view('admin.pages.login');
    }
    public function userLogin(Request $req){
        $email = $req->email;
        $password = $req->password;
        // SELECT * from users WHERE email='anik@gmail.com' AND password='123456'
        $user = User::where('email','=',$email)
                    ->where('password','=',md5($password))
                    ->first(); 
        if($user){
            if($user->is_approved==1){
                Session::put('username',$user->name);
                Session::put('userrole',$user->role);
                return redirect('admin/dashboard');
            }
            else{
                return redirect()->back()->with('info', 'User not approved yet.');
            }
        }
        else{
            return redirect()->back()->with('info', 'Invalid email or password'); 
        }
    }
    public function signout(Request $request){
        $request->session()->forget(['username', 'userrole']);
        return redirect('admin/login');
    }
}