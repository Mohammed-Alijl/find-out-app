<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Repositories\AdminRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private AdminRepository $userRepository, private RoleRepository $roleRepository)
    {
        $this->middleware('permission:view_user', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleRepository->getAll();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->userRepository->create($request);
        return redirect()->route('users.index')->with('add-success',__('success_messages.user.add.success'));
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
        $user = $this->userRepository->find($id);
        $roles = $this->roleRepository->getAll();
        return view('admin.user.create',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $this->userRepository->update($request,$id);
        return redirect()->route('users.index')->with('edit-success',__('success_messages.user.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userRepository->delete($id);
        return redirect()->route('users.index')->with('delete-success',__('success_messages.user.delete.success'));
    }
}
