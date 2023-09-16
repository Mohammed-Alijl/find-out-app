<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Repositories\PageRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use Api_Response;
    public function __construct(private PageRepository $pageRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PageResource::collection($this->pageRepository->getAll());
        return $this->apiResponse($data,200,__('success_messages.page.index'));
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
            $data = new PageResource($this->pageRepository->find($id));
            return $this->apiResponse($data,200,__('success_messages.page.show'));
        }catch (\Exception $exception){
            return $this->apiResponse(null,404,__('failed_messages.page.not_found'));
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
