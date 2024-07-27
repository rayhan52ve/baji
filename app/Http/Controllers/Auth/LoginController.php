<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'identifier' => 'required', // Changed 'phone' to 'identifier'
            'password' => 'required',
        ]);

        $credentials = [
            'password' => $input['password']
        ];

        // Check if the input is a valid phone number
        if (is_numeric($input['identifier'])) {
            $credentials['phone'] = $input['identifier'];
            $user = User::where('phone', $credentials['phone'])->first();
        } else {
            $credentials['name'] = $input['identifier'];
            $user = User::where('name', $credentials['name'])->first();

        }


        if ($user && $user->status == 0) {
            Alert::toast('Login Failed', 'success');
            return redirect('/');
        }

        if ($request->hr_login == 1 && @$user->is_admin == 0) {
            Alert::toast('Login Failed', 'error');
            return redirect('/');
        }

        if ($request->hr_login == 0 && @$user->is_admin != 0) {
            Alert::toast('Login Failed', 'error');
            return redirect('/');
        }

        if (auth()->attempt($credentials)) {

            if (auth()->user()->is_admin != 0 ) {
                Alert::toast('Login Successfull', 'success');
                return redirect()->route('admin.home');
            } else {
                Alert::toast('Login successfully', 'success');
                return redirect('/');
            }
        } else {
            Alert::toast('Username-Phone and Password combination is incorrect.', 'error');
            return redirect()->back();
        }
    }
}
