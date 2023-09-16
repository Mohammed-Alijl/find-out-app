<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Http\Requests\Advertisement\UpdateRequest;
use App\Http\Resources\AdvertisementResource;
use App\Repositories\AdvertisementRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    use Api_Response;
    public function __construct(private AdvertisementRepository $advertisementRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AdvertisementResource::collection($this->advertisementRepository->getAll());
        return $this->apiResponse($data,200,__('success_messages.advertisement.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $customer = auth('sanctum')->user();
            if(!$customer)
                return $this->apiResponse(null,401,__('failed_messages.unauthorized'));
        $advertisement = $this->advertisementRepository->create($request);
        $advertisement->user_id = $customer->id;
        $advertisement->save();
        return $this->apiResponse(new AdvertisementResource($advertisement),201,__('success_messages.advertisement.store'));
        } catch (\Exception $ex) {
            return $this->apiResponse(null, 500, $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = new AdvertisementResource($this->advertisementRepository->find($id));
            return $this->apiResponse($data,200,__('success_messages.advertisement.show'));
        }catch (\Exception $exception){
            return $this->apiResponse(null,404,__('failed_messages.advertisement.not_found'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $customer = auth('sanctum')->user();
            if(!$customer)
                return $this->apiResponse(null,401,__('failed_messages.unauthorized'));
            if ($ad = $customer->advertisements->where('id',$id)->first()){
                $this->advertisementRepository->update($request,$id);
                return $this->apiResponse(new AdvertisementResource($ad),200,__('success_messages.advertisement.update'));
            }else
                return $this->apiResponse(null,404,__('failed_messages.advertisement.not_found'));
        }catch (\Exception $ex){
            return $this->apiResponse(null, 500,$ex->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $customer = auth('sanctum')->user();
            if(!$customer)
                return $this->apiResponse(null,401,__('failed_messages.unauthorized'));
            if ($customer->advertisements->where('id',$id)->first()){
                $this->advertisementRepository->delete($id);
                return $this->apiResponse(null,200,__('success_messages.advertisement.destroy'));
            }else
                return $this->apiResponse(null,404,__('failed_messages.advertisement.not_found'));
        }catch (\Exception $ex){
            return $this->apiResponse(null, 500,$ex->getMessage());
        }
    }

    public function getCustomerAdvertisements(){
        $customer = auth('sanctum')->user();
        if(!$customer)
            return $this->apiResponse(null,401,__('failed_messages.unauthorized'));
        $data = $customer->advertisements;
        return $this->apiResponse($data,200,__('success_messages.advertisement.index'));
    }
}
