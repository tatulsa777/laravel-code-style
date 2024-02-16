<?php

namespace App\Services;

use App\Models\Type;
use Illuminate\Pagination\LengthAwarePaginator;

class TypeService
{
    /**
     * @return LengthAwarePaginator
     */
    public function latest(): LengthAwarePaginator
    {
        return Type::latest()->paginate(10);
    }
}
