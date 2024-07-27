<?php

namespace App\Http\Controllers;

use App\Models\Commission1;
use App\Models\Commission2;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        // Admin
        $user =  User::where('is_admin',0)->pluck('id');
        $agent =  User::where('is_admin',3)->pluck('id');

        $userbalance = Wallet::whereIn('user_id', $user)->sum('balance');
        $agentbalance = Wallet::whereIn('user_id', $agent)->sum('balance');

        $userDeposit['total'] = Deposit::where('status', 1)->sum('amount');
        $userDeposit['today'] = Deposit::where('status', 1)
            ->whereDate('created_at', Carbon::today())
            ->sum('amount');

        $userWithdraw['total'] = Withdraw::where('status', 1)->sum('withdraw_amount');
        $userWithdraw['today'] = Withdraw::where('status', 1)
            ->whereDate('created_at', Carbon::today())
            ->sum('withdraw_amount');

        $totalAgentCommission['total'] = Commission1::sum('amount');
        $totalAgentCommission['today'] = Commission1::whereDate('created_at', Carbon::today())->sum('amount');
        // Admin

        // agent
        $agentsUser =  User::where('agent_id', auth()->user()->id)->pluck('id');
        $agentsUserDeposit['total'] = Deposit::whereIn('user_id', $agentsUser)->where('status', 1)->sum('amount');
        $agentsUserDeposit['today'] = Deposit::whereIn('user_id', $agentsUser)->where('status', 1)
            ->whereDate('created_at', Carbon::today())
            ->sum('amount');

        $agentCommission['total'] = Commission1::where('agent_id', auth()->user()->id)->sum('amount');
        $agentCommission['today'] = Commission1::where('agent_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->sum('amount');
        // agent

        return view('admin.home.index', compact('user','agent','userbalance','agentbalance','userDeposit','userWithdraw','agentsUser','totalAgentCommission', 'agentsUserDeposit', 'agentCommission'));
    }
}
