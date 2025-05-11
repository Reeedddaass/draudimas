<?php

namespace App\Http\Controllers\API;

use App\Models\Owners;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Owners::with('cars')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner = Owners::create($request->only('name', 'surname', 'phone', 'email', 'address'));
        return response()->json($owner, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Owners $owner)
    {
        return response()->json($owner->load('cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owners $owner)
    {
        $owner->update($request->only('name', 'surname', 'phone', 'email', 'address'));
        return response()->json($owner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owners $owner)
    {
        $owner->cars()->delete();
        $owner->delete();
        return response()->json(null, 204);
    }
}
