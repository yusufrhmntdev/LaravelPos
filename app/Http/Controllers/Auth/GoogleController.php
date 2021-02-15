<?php
  
namespace App\Http\Controllers\Auth;
  
use Exception;

use Throwable;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        try {
    
            $user = Socialite::driver('google')->stateless()->user();
            // dd($user->id);
     
            $finduser = User::where('google_id', $user->id)->first();
            // dd($finduser);
     
            if($finduser){
     
                Auth::login($finduser);
    
                // return redirect()->route('crudData');
                return redirect('/dashboard');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => bcrypt('123456')
                ]);
                // dd($newUser);
                
                Auth::login($newUser);
     
                return redirect('/dashboard');
            }
    
        } catch (Exception $e) {
            // dd($e->getMessage());
            // return "akun sudah terdaftar";

            return "akun pernah terdaftar";
        }
    }
}