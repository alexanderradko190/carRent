<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Http\Resources\MaintenanceResource;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::all();
        return MaintenanceResource::collection($maintenances);
    }

    public function store(CreateMaintenanceRequest $request)
    {
        $maintenance = Maintenance::create($request->validated());
        return new MaintenanceResource($maintenance);
    }

    public function show(Maintenance $maintenance)
    {
        return new MaintenanceResource($maintenance);
    }

    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {
        $maintenance->update($request->validated());
        return new MaintenanceResource($maintenance);
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return response()->json(['message' => 'Maintenance deleted']);
    }
}
