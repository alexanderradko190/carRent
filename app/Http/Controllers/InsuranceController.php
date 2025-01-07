<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInsuranceRequest;
use App\Http\Requests\UpdateInsuranceRequest;
use App\Http\Resources\InsuranceResource;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        return InsuranceResource::collection($insurances);
    }

    public function store(CreateInsuranceRequest $request)
    {
        $insurance = Insurance::create($request->validated());
        return new InsuranceResource($insurance);
    }

    public function show(Insurance $insurance)
    {
        return new InsuranceResource($insurance);
    }

    public function update(UpdateInsuranceRequest $request, Insurance $insurance)
    {
        $insurance->update($request->validated());
        return new InsuranceResource($insurance);
    }

    public function destroy(Insurance $insurance)
    {
        $insurance->delete();
        return response()->json(['message' => 'Insurance deleted']);
    }
}
