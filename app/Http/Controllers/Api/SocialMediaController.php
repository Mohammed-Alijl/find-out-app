<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SocialMediaResource;
use App\Repositories\SocialMediaRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    use Api_Response;
    public function __construct(private SocialMediaRepository $socialMediaRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SocialMediaResource::collection($this->socialMediaRepository->getAll());
        return $this->apiResponse($data,200,__('success_messages.socialMedia.index'));
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
            $data = new SocialMediaResource($this->socialMediaRepository->find($id));
            return $this->apiResponse($data,200,__('success_messages.socialMedia.show'));
        }catch (\Exception $exception){
            return $this->apiResponse(null,404,__('failed_messages.socialMedia.not_found'));
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
