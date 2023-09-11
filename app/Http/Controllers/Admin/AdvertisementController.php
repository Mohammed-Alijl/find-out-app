<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Repositories\AdvertisementRepository;
use App\Repositories\CategoryTypeRepository;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

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
    public function store(AdvertisementRequest $request)
    {
        $this->advertisementRepository->create($request);
        return redirect()->route('advertisements.index')->with('add-success',__('success_messages.advertisement.add.success'));
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
        $advertisement = $this->advertisementRepository->find($id);
        $categoryTypes = $this->categoryTypeRepository->getAll();
        $cities = $this->cityRepository->getAll();
        return view('admin.advertisement.edit',compact('advertisement','categoryTypes','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
}
