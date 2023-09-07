<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoneRequest;
use App\Repositories\ZoneRepository;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function __construct(private ZoneRepository $zoneRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = $this->zoneRepository->getAll();
        return view('admin.zone.index',compact('zones'));
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
    public function store(ZoneRequest $request)
    {
        $this->zoneRepository->create($request);
        return redirect()->back()->with('add-success',__('success_messages.zone.add.success'));
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
    public function update(ZoneRequest $request)
    {
        $this->zoneRepository->update($request,$request->id);
        return redirect()->back()->with('edit-success',__('success_messages.zone.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
