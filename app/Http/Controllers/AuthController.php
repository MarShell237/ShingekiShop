<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(){
        // dd("paseer dans index");
        return view('inscription',["villes" => Ville::all()]);
    }
    function doLogin(LoginRequest $request){
        $name = $request->validated('name');
        $password = $request->validated('password');
        $remember = $request->validated('remember_checkbox');

        if(Auth::attempt(['name'=>$name , 'password' => $password],$remember)){
            $user=$request->all();
            $id=User::where('name',$user['name'])->get('id');
            \Session::put('Users_id',$id[0]->id);
            $request->session()->regenerate();
            return redirect()->intended(route('myhome.product'));
        }

        return redirect()->route('notAuthorize');
    }
    function logout(){
        Auth::logout();
        return redirect()->route('myhome.product')->with('success','Vous etes maintenant deconnecter');
    }
}
