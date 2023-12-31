<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(private RoleRepository $roleRepository)
    {
        $this->middleware('permission:view_role', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_role', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_role', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleRepository->getAll();
        $rowNumber = 1;
        return view('admin.roles.index', compact('roles', 'rowNumber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = $this->roleRepository->getPermissions();
        $methods = $this->roleRepository->getMethods();
        $models = $this->roleRepository->getModels();
        return view('admin.roles.create', compact('permission', 'methods', 'models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->roleRepository->create($request);
        return redirect()->route('roles.index')->with('add-success', __('success_messages.role.add.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $methods = $this->roleRepository->getMethods();
        $models = $this->roleRepository->getModels();

        return view('admin.roles.show', compact('role', 'rolePermissions', 'methods', 'models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        if ($role->name == "Admin")
            abort(403);
        $permissions = $this->roleRepository->getPermissions();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $methods = $this->roleRepository->getMethods();
        $models = $this->roleRepository->getModels();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions', 'methods', 'models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->roleRepository->update($request, $id);

        return redirect()->route('roles.index')
            ->with('edit-success', __('success_messages.role.edit.success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->roleRepository->delete($request->id);
        return redirect()->route('roles.index')
            ->with('delete-success', __('success_messages.role.delete.success'));
    }
}
