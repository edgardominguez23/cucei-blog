<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';//RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        $role = Auth::user()->rol->key;

        switch ($role) {
            case 'admin':
                return '/dashboard/post';
                break;
            
            default:
                return '/';
                break;
        }
    }

    public function redirectToProvider($provider = "github"){

        if(!config("services.$provider")) abort(404);

        return Socialite::driver("$provider")->redirect();
    }

    public function handleProviderCallback($provider = "github"){

        if(!config("services.$provider")) abort(404);

        $user = Socialite::driver("$provider")->user();
    }
}
