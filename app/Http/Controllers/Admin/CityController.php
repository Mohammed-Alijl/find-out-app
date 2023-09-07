<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct(private CityRepository $cityRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = $this->cityRepository->getAll();
        return view('admin.city.index',compact('cities'));
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
    public function store(CityRequest $request)
    {
        $this->cityRepository->create($request);
        return redirect()->back()->with('add-success',__('success_messages.city.add.success'));
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
        $this->cityRepository->update($request,$request->id);
        return redirect()->back()->with('add-success',__('success_messages.city.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //should edit this when create the service can't be delete if city contain services
        $this->cityRepository->delete($id);
        return redirect()->back()->with('add-success',__('success_messages.city.delete.success'));
    }
}
