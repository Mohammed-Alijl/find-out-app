<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Contact::get();
    }

    public function find($id)
    {
        return Contact::findOrFail($id);
    }

    public function create($request)
    {
        $contact = new Contact();
        $contact->title = $request->title;
        $contact->message = $request->message;
        $contact->user_id = $request->customer_id;
        $contact->save();
    }

    public function update($request, $id)
    {
        //
    }

    public function delete($id)
    {
        $contact = $this->find($id);
        $contact->delete();
    }

}
