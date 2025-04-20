<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owners;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;
use App\Models\CarPhoto;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('cars.create', ['owner_id' => $request->owner_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $car = new Car();
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->reg_number=$request->reg_number;
        $car->owner_id=$request->owner_id;
        $car->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('car_photos', 'public');
                $car->photos()->create(['photo_path' => $path]);
            }
        }

        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $car->load('photos');
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCarRequest $request, Car $car)
    {
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('car_photos', 'public');
                $car->photos()->create(['photo_path' => $path]);
            }
        }

        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('owners.index');
    }

    public function destroyPhoto(CarPhoto $photo)
    {
        Storage::disk('public')->delete($photo->photo_path);
        $photo->delete();

        return back()->with('success', 'Photo deleted.');
    }
}
