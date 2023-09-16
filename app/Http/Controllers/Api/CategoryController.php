<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Api_Response;
    public function __construct(private CategoryRepository $categoryRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryResource::collection($this->categoryRepository->getAll());
        return $this->apiResponse($data,200,__('success_messages.category.index'));
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
        $data = new CategoryResource($this->categoryRepository->find($id));
        return $this->apiResponse($data,200,__('success_messages.category.show'));
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

    public function getNestedCategories($id){
        $data = CategoryResource::collection($this->categoryRepository->find($id)->childCategories);
        return $this->apiResponse($data,200,__('success_messages.category.index'));
    }
}
