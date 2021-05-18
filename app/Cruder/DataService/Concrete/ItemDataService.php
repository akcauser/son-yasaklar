<?php

namespace App\Cruder\DataService\Concrete;

use App\Cruder\DataService\Abstract\IItemDataService;
use App\Models\Item;

class ItemDataService implements IItemDataService
{
    public function get_all()
    {
        return Item::paginate(15);
    }

    public function filter($search)
    {
        $query = Item::query();
        
        if (isset($search)) {
            $words = explode(' ', $search);
            if (count($words) > 0) {
                $query = $query->where(function ($sQuery) use ($words) {
                    foreach ($words as $word) {
                        $sQuery->orWhere('city', 'like', "%$word%");
						$sQuery->orWhere('slug', 'like', "%$word%");
						$sQuery->orWhere('description', 'like', "%$word%");
						
                    }
                });
            }
        }

        return $query->paginate(15);
    }

    /**
     * @param array $data 
     * @return mixed
     */
    public function store($data)
    {
        $item = new Item();
        $item->city = $data["city"];
		$item->slug = $data["slug"];
		$item->description = $data["description"];
		

        if (!$item->save()) {
            return false;
        }

        return $item;
    }

    /**
     * @param Item $item
     * @param array $data 
     * @return mixed
     */
    public function update(Item $item, $data)
    {
        $item->city = $data["city"];
		$item->slug = $data["slug"];
		$item->description = $data["description"];
		

        if (!$item->save()) {
            return false;
        }

        return $item;
    }

    public function delete(Item $item)
    {
        return $item->delete();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get($id)
    {
        return Item::find($id);
    }
}
