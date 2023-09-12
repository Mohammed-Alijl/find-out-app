<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Http\Requests\Advertisement\UpdateRequest;
use App\Repositories\AdvertisementRepository;
use App\Repositories\CategoryTypeRepository;
use App\Repositories\CityRepository;

class AdvertisementController extends Controller
{
    public function __construct(
        private AdvertisementRepository $advertisementRepository,
        private CategoryTypeRepository $categoryTypeRepository,
        private CityRepository $cityRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = $this->advertisementRepository->getAll();
        return view('admin.advertisement.index',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryTypes = $this->categoryTypeRepository->getAll();
        $cities = $this->cityRepository->getAll();
        return view('admin.advertisement.create',compact('categoryTypes','cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->advertisementRepository->create($request);
        return redirect()->route('advertisements.index')->with('add-success',__('success_messages.advertisement.add.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $advertisement = $this->advertisementRepository->find($id);
        return view('admin.advertisement.show',compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertisement = $this->advertisementRepository->find($id);
        $categoryTypes = $this->categoryTypeRepository->getAll();
        $cities = $this->cityRepository->getAll();
        return view('admin.advertisement.edit',compact('advertisement','categoryTypes','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $this->advertisementRepository->update($request,$id);
        return redirect()->route('advertisements.index')->with('edit-success',__('success_messages.advertisement.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->advertisementRepository->delete($id);
        return redirect()->route('advertisements.index')->with('delete-success',__('success_messages.advertisement.delete.success'));
    }

    public function advertisementRequests(){
        $advertisements = $this->advertisementRepository->getCustomerAdvertisement();
        return view('admin.advertisement.advertisementRequests',compact('advertisements'));
    }

    public function approve($id){
        $this->advertisementRepository->approve($id);
        return redirect()->back()->with('approve-success',__('success-messages.advertisement.approve.success'));
    }
}
