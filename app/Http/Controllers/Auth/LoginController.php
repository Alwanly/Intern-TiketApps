<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

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


    protected function redirectTo()
    {
        if (auth()->user()->role->role == 'admin') {
            return route('dashboard');
        }
        return route('home');
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
//        $this->middleware('isAdmin')->except('logout');
//        $this->middleware('isUser')->except('logout');
    }

//    public function login(Request $request)
//    {
//        $input = $request->all();
//
//        $this->validate($request, [
//            'username' => 'required',
//            'password' => 'required',
//        ]);
//
//        $fieldType = filter_var($request->telephone, FILTER_VALIDATE_EMAIL) ? 'telephone' : 'email';
//        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
//        {
//            return $this->redirectTo();
//        }else{
//            throw ValidationException::withMessages([
//                $this->username() => [trans('auth.failed')],
//            ]);
//        }
//
//    }
    public function username()
    {

        $login = request()->input('username');

        if(is_numeric($login)){
            $field = 'telephone';
        } else {
            filter_var($login, FILTER_VALIDATE_EMAIL);
            $field = 'email';
        }


        request()->merge([$field => $login]);

        return $field;
    }

}
