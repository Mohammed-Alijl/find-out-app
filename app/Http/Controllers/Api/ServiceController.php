<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Repositories\ServiceRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use Api_Response;
    public function __construct(private ServiceRepository $serviceRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ServiceResource::collection($this->serviceRepository->getAll());
        return $this->apiResponse($data,200,__('success_messages.service.index'));
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
        try {
            $data = new ServiceResource($this->serviceRepository->find($id));
            return $this->apiResponse($data,200,__('success_messages.service.show'));
        }catch (\Exception $exception){
            return $this->apiResponse(null,404,__('failed_messages.service.not_found'));
        }
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
