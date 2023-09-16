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
        return $customer;
    }

    public function update($request, $id)
    {
        $customer = User::findOrFail($id);
        if ($request->filled('name'))
            $customer->name = $request->name;
        if ($request->filled('email'))
            $customer->email = $request->email;
        if ($request->filled('mobile_number'))
            $customer->mobile_number = $request->mobile_number;
        if ($request->filled('zone_id'))
            $customer->zone_id = $request->zone_id;
        if ($request->filled('city_id'))
            $customer->city_id = $request->city_id;
        if ($request->filled('platform'))
            $customer->platform = $request->platform;
        if ($request->filled('password'))
            $customer->password = Hash::make($request->password);
        $customer->save();
        return $customer;
    }

    public function delete($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();
    }

    public function checkEmail($email)
    {
        return User::where('email', $email)->exists();
    }

    public function checkMobile($mobile_number)
    {
        return User::where('mobile_number', $mobile_number)->exists();
    }
}
