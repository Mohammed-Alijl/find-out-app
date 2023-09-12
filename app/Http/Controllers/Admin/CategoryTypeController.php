<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryTypeRequest;
use App\Repositories\CategoryTypeRepository;
use Illuminate\Http\Request;

class CategoryTypeController extends Controller
{
    public function __construct(private CategoryTypeRepository $typeRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = $this->typeRepository->getAll();
        return view('admin.category.type.index', compact('types'));
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
    public function store(CategoryTypeRequest $request)
    {
        $this->typeRepository->create($request);
        return redirect()->back()->with('add-success', __('success_messages.category.type.add.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request)
    {
        $this->typeRepository->update($request, $request->id);
        return redirect()->back()->with('edit-success', __('success_messages.category.type.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = $this->typeRepository->find($id);
        if ($type->categories->count() > 0) {
            return redirect()->back()->with('delete-failed', __('failed_messages.category.type.delete.failed'));
        } else {
            $this->typeRepository->delete($id);
            return redirect()->back()->with('delete-success', __('success_messages.category.type.delete.success'));
        }
    }

    public function getServices($id){
        $subCategories = $this->typeRepository->getServices($id)->pluck('name', 'id');
        return json_encode($subCategories);
    }
}
