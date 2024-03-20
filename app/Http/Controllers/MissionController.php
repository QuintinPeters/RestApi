<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMissionRequest;
use App\Http\Requests\UpdateMissionRequest;
use App\Http\Resources\MissionCollection;
use App\Http\Resources\MissionResource;
use App\Models\mission;
use Auth;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new MissionCollection(Mission::paginate());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, mission $mission)
    {
        
        return new MissionResource($mission);
    }

    public function store(StoreMissionRequest $request)
    {
        $valitated = $request->validated();

         $mission = Auth::user()->missions()->create($valitated);

         return new MissionResource($mission);    
    }

    public function update(UpdateMissionRequest $request, Mission $mission)
    {
        $validated = $request->validated();

        $mission->Update($validated);
        
        return new MissionResource($mission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mission $mission)
    {
        $mission->delete();
        return response()->noContent();
    }
}
