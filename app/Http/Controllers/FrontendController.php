<?php

namespace App\Http\Controllers;

use App\Models\BajiChallenge;
use App\Models\PaymentNumber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.modules.index');
    }

    public function profile()
    {
        return view('frontend.modules.profile');
    }

    public function deposit()
    {
        $paymentNumbers = PaymentNumber::first();
        return view('frontend.modules.deposit_withdrawal.deposit_withdrawal',compact('paymentNumbers'));
    }

    public function bajiChalenge()
    {
        $bajiChallenges = BajiChallenge::orderBy('level')->get();
        $user = auth()->user();
        @$totalDeposit = optional($user->deposits)->sum('amount');

        $activeLevel = null;

        // Check if the user has already claimed each reward
        foreach ($bajiChallenges as $bajiChallenge) {
            @$bajiChallenge->claimed = $bajiChallenge->users->contains($user->id);

            if ($totalDeposit <= $bajiChallenge->requirement) {
                // If so, set $activeLevel to the current challenge and break the loop
                $activeLevel = $bajiChallenge;
                break; // Exit the loop as we found the active level
            }
        }

        return view('frontend.modules.baji_challenge', compact('bajiChallenges', 'totalDeposit','activeLevel'));
    }

    public function promotion()
    {
        return view('frontend.modules.promotions');
    }
}
