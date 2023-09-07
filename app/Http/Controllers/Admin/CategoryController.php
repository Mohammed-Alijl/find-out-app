<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $categories = $this->categoryRepository->getAll();
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
    public function store(Request $request)
    {
        $this->categoryRepository->create($request);
        return redirect()->back()->with('add-success',__('success_message.category.add.success'));
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
        $this->categoryRepository->update($request,$request->id);
        return redirect()->back()->with('add-success',__('success_message.category.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->back()->with('add-success',__('success_message.category.delete.success'));
    }
}
