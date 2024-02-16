<?php

namespace App\Services;

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
}
