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
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
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
