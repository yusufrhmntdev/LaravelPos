<?php

namespace App\Http\Controllers\Authentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class OtetikansiController extends Controller
{
    //
    public function index()
    {
        //
        return view('otentikasi.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        // $data = User::where('email',$request->email )->first();
        // // dd($request->password);
        // if($data)
        // {
        //     if(Hash::check($request->password,$data->password));
        //     {
        //        
        //     }
           
        // }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('/dashboard');
        }
        return redirect('/')->with('message','Email / Password Salah');
    }

    public function logout(Request $request)
    {
    //    Auth::logout();
    //    return redirect('/');
    }
       
}
