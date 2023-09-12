<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryTypeRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryRepository $categoryRepository, private CategoryTypeRepository $categoryTypeRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->getParentsCategories();
        $types = $this->categoryTypeRepository->getAll();
        return view('admin.category.index',compact('categories','types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create($request);
        return redirect()->back()->with('add-success',__('success_messages.category.add.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parentCategory = $this->categoryRepository->find($id);
        $categories = $this->categoryRepository->getChildCategories($id);
        $types = $this->categoryTypeRepository->getAll();
        $parentsCategories = $this->categoryRepository->getNonChildCategory($id);
        return view('admin.category.show', compact('categories','parentCategory','types','parentsCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request)
    {
        $this->categoryRepository->update($request,$request->id);
        return redirect()->back()->with('edit-success',__('success_messages.category.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->categoryRepository->find($id);
        if ($this->categoryRepository->getChildCategories($category->id)->count() > 0 || $category->services->count() > 0) {
            return redirect()->back()->with('delete-failed', __('failed_messages.category.delete.failed'));
        }else{
            $this->categoryRepository->delete($id);
            return redirect()->back()->with('delete-success',__('success_messages.category.delete.success'));
        }

    }

    public function getSubCategories($id){
        $subCategories = $this->categoryRepository->getChildCategories($id)->pluck('name', 'id');
        return json_encode($subCategories);
    }
}
