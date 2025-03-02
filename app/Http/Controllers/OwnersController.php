<?php

namespace App\Http\Controllers;

use App\Models\Owners;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owners::all();
        return view('owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner = new Owners();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->phone=$request->phone;
        $owner->email=$request->email;
        $owner->address=$request->address;
        $owner->save();

        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owners $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owners $owner)
    {
        return view('owners.edit', ['owner' => $owner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owners $owner)
    {
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->phone=$request->phone;
        $owner->email=$request->email;
        $owner->address=$request->address;
        $owner->save();

        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owners $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index');
    }
}
