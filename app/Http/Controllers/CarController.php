<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return CarResource::collection($cars);
    }

    public function store(CreateCarRequest $request)
    {
        Log::info('Reached store method');

        try {
            $validatedData = $request->validated();
            Log::info('Validated data: ', $validatedData);

            $car = Car::create($validatedData);
            Log::info('Car created: ', ['id' => $car->id]);

            return new CarResource($car);
        } catch (\Exception $e) {
            Log::error('Error creating car: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create car', 'details' => $e->getMessage()], 500);
        }
    }

    public function show(Car $car)
    {
        return new CarResource($car);
    }

    public function update(CreateCarRequest $request, Car $car)
    {
        try {
            $car->update($request->validated());
            return new CarResource($car);
        } catch (\Exception $e) {
            Log::error('Error updating car: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update car', 'details' => $e->getMessage()], 500);
        }
    }

    public function destroy(Car $car)
    {
        try {
            $car->delete();
            return response()->json(['message' => 'Car deleted']);
        } catch (\Exception $e) {
            Log::error('Error deleting car: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete car', 'details' => $e->getMessage()], 500);
        }
    }
}
