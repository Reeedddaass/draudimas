<?php

namespace App\Http\Controllers\API;


use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Car::with('photos')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car = Car::create($request->only('brand', 'model', 'reg_number', 'owner_id'));
        return response()->json($car, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($car->load('photos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->only('brand', 'model', 'reg_number'));
        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(null, 204);
    }
}
