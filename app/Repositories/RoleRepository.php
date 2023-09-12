<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Admin;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements BasicRepositoryInterface
{

    protected $methods = ['view', 'add', 'edit', 'delete'];
    protected $models = [
        'category_type','category','zone','city','service','advertisement','advertisement_request',
        'page','social','contact','user','customer'
    ];

    public function getAll()
    {
        return Role::orderBy('id', 'Asc')->get();
    }

    public function find($id)
    {
        return Role::findOrFail($id);
    }

    public function create($request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->save();
        $permissions = Permission::whereIn('name', $request->permission)->get();
        $role->syncPermissions($permissions);
    }

    public function update($request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $permissions = Permission::whereIn('name', $request->permission)->get();
        $role->syncPermissions($permissions);
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }

    public function getPermissions()
    {
        return Permission::get();
    }

    public function getMethods()
    {
        return $this->methods;
    }

    public function getModels()
    {
        return $this->models;
    }

}
