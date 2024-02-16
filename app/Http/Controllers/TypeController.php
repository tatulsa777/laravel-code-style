<?php

namespace App\Http\Controllers;

use App\Http\Resources\Types\TypeResource;
use App\Services\TypeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TypeController extends Controller
{
    /**
     * @param TypeService $service
     */
    public function __construct(
        protected TypeService $service
    )
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return TypeResource::collection($this->service->latest());
    }
}
