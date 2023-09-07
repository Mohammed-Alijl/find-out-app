<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Zone;

class ZoneRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Zone::get();
    }

    public function find($id)
    {
        return Zone::findOrFail($id);
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement create() method.
    }

    public function delete($id)
    {
        $zone = Zone::findOrFail($id);
        $zone->delete();
    }

}
