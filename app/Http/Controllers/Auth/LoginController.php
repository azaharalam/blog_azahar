<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        $var = Socialite::driver('linkedin')
        ->scopes(['r_liteprofile', 'r_emailaddress'])
        ->redirect();
        return $var;
    }

    public function handleProviderCallback(Request $request)
    {
        try{
            $user = Socialite::driver('linkedin')->stateless()->user();
            $authUser = $this->findOrCreateUser($user);
            Auth::login($authUser, true);
            return redirect($this->redirectTo);
        }catch(Exception $exception)
        {
            dd($exception);
        }
    }

    public function findOrCreateUser($user)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        
        if ($authUser) {
            return $authUser;
        }
        
        return User::create([
            'name'        => $user->name,
            'email'       => $user->email,
            'provider'    => 'linkedin',
            'provider_id' => $user->id
        ]);
    }
}
