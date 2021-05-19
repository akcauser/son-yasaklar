<?php

namespace App\Cruder\DataService\Abstract;

use App\Models\Item;

interface IItemDataService
{
    public function get_all();
    public function filter($search);
    public function store($data);
    public function update(Item $item, $data);
    public function delete(Item $item);
    public function get($id);
    public function get_by_slug($slug);
}
