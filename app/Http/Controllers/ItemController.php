<?php

namespace App\Http\Controllers;

use App\Http\Resources\Items\ItemResource;
use App\Services\ItemService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemController extends Controller
{
    /**
     * @param ItemService $service
     */
    public function __construct(
        protected ItemService $service
    )
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ItemResource::collection($this->service->latest());
    }
}
