<?php

namespace App\Cruder\Service\Abstract;

use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;

interface IItemService
{
    public function get_all();
    public function store(ItemStoreRequest $request);
    public function update(ItemUpdateRequest $request, $id);
    public function delete($id);
    public function get($id);
    public function get_by_slug($id);
}
