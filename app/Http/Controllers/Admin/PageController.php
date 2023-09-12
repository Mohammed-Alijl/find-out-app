<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StoreRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(private PageRepository $pageRepository)
    {
        $this->middleware('permission:view_page', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_page', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_page', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_page', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = $this->pageRepository->getAll();
        return view('admin.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->pageRepository->create($request);
        return redirect()->route('pages.index')->with('add-success',__('success_messages.page.add.success'));
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
        $page = $this->pageRepository->find($id);
        return view('admin.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $this->pageRepository->update($request,$id);
        return redirect()->route('pages.index')->with('edit-success',__('success_messages.page.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->pageRepository->delete($id);
        return redirect()->route('pages.index')->with('delete-success',__('success_messages.page.delete.success'));
    }
}
