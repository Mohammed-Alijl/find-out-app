<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaRequest;
use App\Repositories\SocialMediaRepository;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function __construct(private SocialMediaRepository $socialMediaRepository)
    {
        $this->middleware('permission:view_social', ['only' => ['index']]);
        $this->middleware('permission:edit_service', ['only' => ['update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialMedias = $this->socialMediaRepository->getAll();
        return view('admin.socialMedia.index',compact('socialMedias'));
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
    public function update(SocialMediaRequest $request)
    {
        $this->socialMediaRepository->update($request,$request->id);
        return redirect()->back()->with('edit-success',__('success_messages.social.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
