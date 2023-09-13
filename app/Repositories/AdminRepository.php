<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Admin::get();
    }

    public function find($id)
    {
        return Admin::findOrFail($id);
    }

    public function create($request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->mobile_number = $request->mobile_number;
        $admin->password = Hash::make($request->password);
        if ($request->file('image')) {
            $path = $request->file('image')->store('admins', 'image');
            $admin->image = $path;
        }
        $admin->save();
    }

    public function update($request, $id)
    {
        $admin = $this->find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->mobile_number = $request->mobile_number;
        if ($request->file('image')) {
            if ($admin->image != 'admins/default.png')
                Storage::disk('image')->delete($admin->image);
            $path = $request->file('image')->store('admins', 'image');
            $admin->image = $path;
        }
        if($request->filled('password')){
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
    }

    public function delete($id)
    {
        $admin = $this->find($id);
        $admin->delete();
    }

    public function checkEmail($email){
        return Admin::where('email', $email)->exists();
    }
    public function checkMobile($mobile_number){
        return Admin::where('mobile_number', $mobile_number)->exists();
    }
    public function checkUsername($username){
        return Admin::where('username', $username)->exists();
    }

}
