<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(private ServiceRepository $serviceRepository,
                                private CategoryRepository $categoryRepository,
                                private ZoneRepository $zoneRepository,)
    {
        $this->middleware('permission:view_service', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_service', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_service', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_service', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->serviceRepository->getAll();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $zones = $this->zoneRepository->getAll();
        return view('admin.service.create',compact('categories','zones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->serviceRepository->create($request);
        return redirect()->route('services.index')->with('add-success',__('success_messages.service.add.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = $this->serviceRepository->find($id);
        return view('admin.service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = $this->serviceRepository->find($id);
        $categories = $this->categoryRepository->getAll();
        $zones = $this->zoneRepository->getAll();
        return view('admin.service.edit',compact('categories','service','zones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $this->serviceRepository->update($request,$id);
        return redirect()->route('services.index')->with('edit-success',__('success_messages.service.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->serviceRepository->delete($id);
        return redirect()->route('services.index')->with('delete-success',__('success_messages.service.delete.success'));
    }
}
