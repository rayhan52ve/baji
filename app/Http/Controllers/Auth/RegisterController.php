<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\isAgent;
use App\Models\Commission1;
use App\Models\Commission2;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Generate a unique 10-digit code for referral
        do {
            $referralCode = strtoupper(Str::random(10));
        } while (User::where('referral', $referralCode)->exists());

        @$referer = User::where('referral', $data['on_refer'])->first();
        if (@$referer->is_admin == 3) {
            $refererId = $referer->id;
            $agentId = $referer->id;
        } else {
            @$refererId = $referer->id;
            @$agentId = $referer->agent_id;
        }


        $user = User::create([
            'name' => $data['name'],
            'calling_code' => $data['calling_code'],
            'phone' => $data['phone'],
            'referral' => $referralCode,
            'on_refer' => $data['on_refer'],
            'referer_id' => @$refererId,
            'agent_id' => @$agentId,
            'currency' => $data['currency'],
            'email' => @$data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Wallet::create([
            'user_id' => $user->id,
            'balance' => 0,
        ]);

        return $user;
    }
}
