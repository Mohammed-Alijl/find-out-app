<?php

namespace App\Http\Controllers\Api;

use App\Traits\Api_Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryTypeResource;
use App\Repositories\CategoryTypeRepository;
use Illuminate\Http\Request;

class CategoryTypeController extends Controller
{
    use Api_Response;
    public function __construct(private CategoryTypeRepository $categoryTypeRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryTypeResource::collection($this->categoryTypeRepository->getAll());
        return $this->apiResponse($data,200,__('success_messages.category.type.index'));
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
        $data = new CategoryTypeResource($this->categoryTypeRepository->find($id));
        return $this->apiResponse($data,200,__('success_messages.category.type.show'));
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
