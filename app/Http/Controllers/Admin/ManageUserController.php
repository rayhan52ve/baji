<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission1;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_admin', 0)->latest()->get();
        $referCounts = [];

        // Loop through each user and get their referral count
        foreach ($users as $user) {
            $referer[$user->id] = User::where('on_refer', $user->referral)->get();
            $referCounts[$user->id] = User::where('on_refer', $user->referral)->count();
        }
        $pageTitle = 'Customer List';
        return view('admin.modules.manage_user.index', compact('users', 'pageTitle','referCounts'));
    }

    public function admin()
    {
        $pageTitle = 'Admin 1 List';
        $users = User::where('is_admin', 2)->latest()->get();
        $referCounts = [];

        // Loop through each user and get their referral count
        foreach ($users as $user) {
            $referCounts[$user->id] = User::where('on_refer', $user->referral)->count();
        }
        return view('admin.modules.manage_user.index', compact('users', 'pageTitle', 'referCounts'));
    }

    public function admin2()
    {
        $pageTitle = 'Admin 2 List';
        $users = User::where('is_admin', 4)->latest()->get();
        $referCounts = [];

        // Loop through each user and get their referral count
        foreach ($users as $user) {
            $referCounts[$user->id] = User::where('on_refer', $user->referral)->count();
        }
        return view('admin.modules.manage_user.index', compact('users', 'pageTitle', 'referCounts'));
    }

    public function agent()
    {
        $pageTitle = 'Agent List';
        $users = User::where('is_admin', 3)->latest()->get();
        $referCounts = [];



        // Loop through each user and get their referral count
        foreach ($users as $user) {

            $referCounts[$user->id] = User::where('agent_id', $user->id)->count();
        }
        return view('admin.modules.manage_user.index', compact('users', 'pageTitle', 'referCounts'));
    }

    public function agentCommissionDetails($id)
    {
        $user = User::find($id);
        $user->load('agentCommission');
        return view('admin.modules.manage_user.agent_commission',compact('user'));
    }

    public function customerCommissionDetails($id)
    {
        $user = User::find($id);
        $user->load('customerCommission');
        // dd($user);
        return view('admin.modules.manage_user.customer_commission',compact('user'));
    }

    public function userStatus($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 0) {
            $user->status = 1;
            $user->save();
            Alert::toast("User Actived.", 'success');
        } elseif ($user->status == 1) {
            $user->status = 0;
            $user->save();
            Alert::toast("User Inactived.", 'success');
        }

        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.manage_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'is_admin' => 'required',
            'email' => 'nullable|email|unique:users|max:255',
            'phone' => 'required|unique:users',
            'password' => 'nullable|string|min:6',
        ]);

        // Generate a unique 8-digit code for referral
        do {
            $referralCode = strtoupper(Str::random(10));
        } while (User::where('referral', $referralCode)->exists());

        $validatedData['referral'] = $referralCode;

        $validatedData['password'] = bcrypt($request->input('password'));

        $user = User::create($validatedData);


        Wallet::create([
            'user_id' => $user->id,
            'balance' => 0,
        ]);

        // Handle file upload
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $path = 'uploads/user/';
        //     $file->move(public_path($path), $filename);
        //     $user->userDetail()->create(['image' => $filename]);
        // }

        Alert::toast("User Created Successfully.", 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $previoiusRoute = url()->previous();
        return view('admin.modules.manage_user.edit', compact('user', 'previoiusRoute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'phone' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'balance' => 'nullable|numeric',

        ]);

        // Check if password is provided before updating
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            // Remove the 'password' key if not provided
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        $user->wallet()->update(['balance' => $request->balance]);

        Alert::toast("User Updated Successfully.", 'success');
        return redirect($request->previous_route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        @$destination = 'uploads/user/' . $user->userDetail->image;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        $user->delete();
        Alert::toast("User Deleted Successfully.", 'success');
        return redirect()->back();
    }
}
