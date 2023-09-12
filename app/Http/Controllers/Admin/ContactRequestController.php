<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function __construct(private ContactRepository $contactRepository)
    {
        $this->middleware('permission:view_contact', ['only' => ['index', 'show']]);
        $this->middleware('permission:delete_contact', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactRequests = $this->contactRepository->getAll();
        return view('admin.contactRequest.index',compact('contactRequests'));
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->contactRepository->delete($id);
        return redirect()->route('contacts.index')->with('delete-success',__('success_message.contact.delete.success'));
    }
}
