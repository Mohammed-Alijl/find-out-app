<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return User::get();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function create($request)
    {
        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile_number = $request->mobile_number;
        $customer->zone_id = $request->zone_id;
        $customer->city_id = $request->city_id;
        $customer->platform = $request->platform;
        $customer->password = Hash::make($request->password);
        $customer->save();
    }

    public function update($request, $id)
    {
        $customer = User::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile_number = $request->mobile_number;
        $customer->zone_id = $request->zone_id;
        $customer->city_id = $request->city_id;
        $customer->platform = $request->platform;
        if ($request->filled('password'))
            $customer->password = Hash::make($request->password);
        $customer->save();
    }

    public function delete($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();
    }

    public function checkEmail($email){
        return User::where('email', $email)->exists();
    }
    public function checkMobile($mobile_number){
        return User::where('mobile_number', $mobile_number)->exists();
    }
}
