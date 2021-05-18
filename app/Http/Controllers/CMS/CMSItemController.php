<?php

namespace App\Http\Controllers\CMS;

use App\Cruder\Service\Abstract\IItemService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;

class CMSItemController extends Controller
{
    protected IItemService $itemService;

    public function __construct(IItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $items = $this->itemService->get_all();
        return view('cms.items.index', compact('items'));
    }

    public function show($id)
    {
        $item = $this->itemService->get($id);
        if ($item === 404)
            abort(404);

        return view('cms.items.show', compact('item'));
    }

    public function create()
    {
        return view('cms.items.create');
    }

    public function store(ItemStoreRequest $request)
    {
        $response = $this->itemService->store($request);
        if ($response === 500)
            return back()->with('Success', 'Not created.');
        
        return back()->with('Success', 'Created');
    }

    public function edit($id)
    {
        $item = $this->itemService->get($id);
        if ($item === 404)
            abort(404);

        return view('cms.items.edit', compact('item'));
    }

    public function update(ItemUpdateRequest $request, $id)
    {
        $response = $this->itemService->update($request, $id);
        if ($response === 500)
            return back()->with('Success', 'Not Updated.');
        elseif ($response === 404)
            abort(404);

        return back()->with('Success', 'Updated.');
    }

    public function delete($id)
    {
        $response = $this->itemService->delete($id);
        if ($response === 500)
            return back()->with('Success', 'Not deleted.');
        elseif ($response === 404)
            abort(404);

        // todo: list page open
    }
}

