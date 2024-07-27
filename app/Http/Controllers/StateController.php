<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateStoreRequest;
use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::latest('id')->select(['id', 'state_name', 'state_slug', 'is_active', 'updated_at'])->paginate(30);
        return view('admin.state.state', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        State::create([
            'state_name' => $request->state_name,
            'state_slug' => Str::slug($request->state_name)
        ]);

        return redirect()->route('state.index')->with('message','State added successfully');
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
    public function edit($state_slug)
    {
        $state = State::where('state_slug', $state_slug)->first();
        // return $category;
        return view('admin.state.edit_state', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $state_slug)
    {
        // dd($request->all());
        $state = State::where('state_slug', $state_slug)->first();
        $state->update([
            'state_name' => $request->state_name,
            'state_slug' => Str::slug($request->state_name),
            'is_active' => $request->filled('is_active'),
        ]);

        return redirect()->route('state.index')->with('message','State Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($state_slug)
    {
        // dd($state_slug);
        $state = State::where('state_slug', $state_slug)->first();

        $state->delete();
        return redirect()->route('state.index')->with('message','State Deleted successfully');
    }
}
