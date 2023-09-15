<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZoneResource;
use App\Repositories\ZoneRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    use Api_Response;
    public function __construct(private ZoneRepository $zoneRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ZoneResource::collection($this->zoneRepository->getAll());
        return $this->apiResponse($data,200,__('success_messages.zone.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new ZoneResource($this->zoneRepository->find($id));
        return $this->apiResponse($data,200,__('success_messages.zone.show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
