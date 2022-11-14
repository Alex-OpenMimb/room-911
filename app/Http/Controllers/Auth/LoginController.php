<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

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


    public function username()
    {
        return 'user_name';
    }

    public function login(Request $request){
        if(Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])){
            if(Auth::user()->status == "Inactive"){
                Auth::logout();
                return redirect()->route('login')->with('message','Your user account is disabled, contact the admin to active your account');
            }if(Auth::user()->role->name != "Admin room 911"){
                Auth::logout();
                return redirect()->route('login')->with('message','Your user account it´s not administrato role');
            }
            else{
                $user               = User::find(Auth::user()->id);
                $user->last_access  = Carbon::now()->format('d/m/y h:i:s A');
                $user->save();
                return redirect()->route('accessroom');
            }
        }
        return redirect()->route('login')->with('message', 'Invalid credentials');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
