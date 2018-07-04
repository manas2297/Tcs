<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\UserDetail;
use App\Events\Event;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except'=>['logout']]);
    }
    protected function authenticated (Request $request, Authenticatable $user)
    {
      $date=Carbon::now()->toDateString();
      $time=Carbon::now()->toDateTimeString();
      UserDetail::create([
        'user_id'=>Auth::id(),
        'clock_in_date'=>$date,
        'clock_in_time'=>$time
      ]);
      User::where('id',Auth::id())->update(array('last_login'=> $time));
      return redirect()->intended($this->redirectTo);
    }
    public function logout(Request $request)
    {
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toDateTimeString();
        $input = [
          'clock_out_date'=>$date,
          'clock_out_time'=>$time
        ];

        UserDetail::where('user_id',Auth::id())->where('clock_in_date',$date)->where('clock_out_date',null)->where('clock_out_time',null)->update($input);
          Auth::guard('web')->logout();
          return redirect('/');


    }

}
