<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Repositories\CityRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;

class CityController extends Controller
{
    use Api_Response;
    public function __construct(private CityRepository $cityRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CityResource::collection($this->cityRepository->getAll());
        return $this->apiResponse($data,200,__('success_messages.city.index'));
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
            $data = new CityResource($this->cityRepository->find($id));
            return $this->apiResponse($data,200,__('success_messages.city.show'));
        }catch (\Exception $exception){
            return $this->apiResponse(null,404,__('failed_messages.city.not_found'));
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
