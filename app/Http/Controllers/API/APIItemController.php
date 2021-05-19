<?php

namespace App\Http\Controllers\API;

use App\Cruder\Service\Abstract\IItemService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;

class APIItemController extends Controller
{
    protected IItemService $itemService;

    public function __construct(IItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $items = $this->itemService->get_all();

        return response()->json($items);
    }


    public function show($id)
    {
        $response = $this->itemService->get($id);
        if ($response === 404)
            return response()->json('Item not found', 404);

        return response()->json($response);
    }

    public function show_by_slug($slug)
    {
        $response = $this->itemService->get_by_slug($slug);
        if ($response === 404)
            return response()->json('Item not found', 404);

        return response()->json($response);
    }

    public function store(ItemStoreRequest $request)
    {
        $response = $this->itemService->store($request);
        if ($response === 500)
            return response()->json('Item not created', 500);
        elseif ($response === 404)
            return response()->json('Item not found', 404);

        return response()->json($response);
    }

    public function update(ItemUpdateRequest $request, $id)
    {
        $response = $this->itemService->update($request, $id);
        if ($response === 500)
            return response()->json('Item not updated', 500);
        elseif ($response === 404)
            return response()->json('Item not found', 404);

        return response()->json($response);
    }

    public function destroy($id)
    {
        $response = $this->itemService->delete($id);
        if ($response === 500)
            return response()->json('Item not deleted', 500);
        elseif ($response === 404)
            return response()->json('Item not found', 404);

        return response()->json('Item deleted');
    }
}
