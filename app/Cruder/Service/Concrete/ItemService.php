<?php

namespace App\Cruder\Service\Concrete;

use App\Cruder\DataService\Abstract\IItemDataService;
use App\Cruder\Service\Abstract\IItemService;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;

class ItemService implements IItemService
{
    private IItemDataService $itemDataService;

    public function __construct(IItemDataService $itemDataService)
    {
        $this->itemDataService = $itemDataService;
    }

    public function get($id)
    {
        $item = $this->itemDataService->get($id);
        if (!$item) {
            return 404;
        }

        return $item;
    }

    public function get_by_slug($slug)
    {

        $item = $this->itemDataService->get_by_slug($slug);
        if (!$item) {
            return 404;
        }

        return $item;
    }

    public function get_all()
    {
        if (request('search')) {
            return $this->itemDataService->filter(request('search'));
        } else {
            return $this->itemDataService->get_all();
        }
    }

    public function store(ItemStoreRequest $request)
    {
        $response = $this->itemDataService->store($request->all());
        if (!$response) {
            return 500;
        }

        return $response;
    }

    public function update(ItemUpdateRequest $request, $id)
    {
        $item = $this->itemDataService->get($id);
        if (!$item) {
            return 404;
        }

        $response = $this->itemDataService->update($item, $request->all());
        if (!$response) {
            return 500;
        }

        return $response;
    }

    public function delete($id)
    {
        $item = $this->itemDataService->get($id);
        if (!$item) {
            return 404;
        }

        $response = $this->itemDataService->delete($item);
        if (!$response) {
            return 500;
        }

        return $response;
    }
}
