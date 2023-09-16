<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactUsResource;
use App\Repositories\ContactRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    use Api_Response;
    public function __construct(private ContactRepository $contactRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        try {
                $data = new ContactUsResource($this->contactRepository->create($request));
                return $this->apiResponse($data,201,__('success_messages.contact.store'));
        }catch (\Exception $ex){
            return $this->apiResponse(null,500,$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
