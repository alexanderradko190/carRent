<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Http\Resources\RentalResource;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        return RentalResource::collection($rentals);
    }

    public function store(CreateRentalRequest $request)
    {
        $rental = Rental::create($request->validated());
        return new RentalResource($rental);
    }

    public function show(Rental $rental)
    {
        return new RentalResource($rental);
    }

    public function update(UpdateRentalRequest $request, Rental $rental)
    {
        $rental->update($request->validated());
        return new RentalResource($rental);
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return response()->json(['message' => 'Rental deleted']);
    }
}
