<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Repositories\CustomerRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private CustomerRepository $customerRepository, private ZoneRepository $zoneRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this->customerRepository->getAll();
        return view('admin.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zones = $this->zoneRepository->getAll();
        return view('admin.customer.create',compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->customerRepository->create($request);
        return redirect()->route('customers.index')->with('add-success',__('success_messages.customer.add.success'));
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
        $customer = $this->customerRepository->find($id);
        $zones = $this->zoneRepository->getAll();
        return view('admin.customer.edit',compact('customer','zones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $this->customerRepository->update($request,$id);
        return redirect()->route('customers.index')->with('edit-success',__('success_messages.customer.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->customerRepository->delete($id);
        return redirect()->route('customers.index')->with('delete-success',__('success_messages.customer.delete.success'));
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        $exists = $this->customerRepository->checkEmail($email);

        return response()->json(['exists' => $exists]);
    }

    public function checkMobile(Request $request)
    {
        $mobile_number = $request->input('mobile_number');

        $exists = $this->customerRepository->checkMobile($mobile_number);

        return response()->json(['exists' => $exists]);
    }


}
