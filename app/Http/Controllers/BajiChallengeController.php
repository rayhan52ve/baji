<?php

namespace App\Http\Controllers;

use App\Models\BajiChallenge;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BajiChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = BajiChallenge::all();
        return view('admin.modules.baji_challenge.create',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BajiChallenge::create($request->all());

        Alert::toast("New Level Created Successfully.", 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BajiChallenge  $bajiChallenge
     * @return \Illuminate\Http\Response
     */
    public function show(BajiChallenge $bajiChallenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BajiChallenge  $bajiChallenge
     * @return \Illuminate\Http\Response
     */
    public function edit(BajiChallenge $bajiChallenge)
    {
        return view('admin.modules.baji_challenge.edit',compact('bajiChallenge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BajiChallenge  $bajiChallenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BajiChallenge $bajiChallenge)
    {
        $bajiChallenge->update($request->all());
        Alert::toast("Baji Challenge Updated Successfully.", 'success');

        return redirect()->route('superadmin.baji-challenge.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BajiChallenge  $bajiChallenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(BajiChallenge $bajiChallenge)
    {
        //
    }

    public function claim_reward(Request $request,$id)
    {
        $bajiChallenge = BajiChallenge::find($id);
        $bajiChallenge->users()->attach($request->input('user_id'));

        $bajiChallenge->save();

        Alert::toast("Reward Claimed.", 'success');

        return redirect()->back();

    }
}
