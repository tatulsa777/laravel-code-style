<?php

namespace App\Services\Admin;

use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemService
{
    /**
     * @return LengthAwarePaginator
     */
    public function latest(): LengthAwarePaginator
    {
            return Item::latest()
            ->with([
                'type'
            ])
            ->paginate(10);
    }

    /**
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        Item::create($data);
    }

    /**
     * @param Item $item
     * @return int
     */
    public function edit(Item $item): int
    {
        return $item->type->id;
    }

    /**
     * @param Item $item
     * @param array $data
     * @return void
     */
    public function update(Item $item, array $data): void
    {
        $item->update($data);
    }

    /**
     * @param Item $item
     * @return void
     */
    public function delete(Item $item): void
    {
        $item->delete();
    }
}
