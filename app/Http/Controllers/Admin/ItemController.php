<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreItemRequest;
use App\Http\Requests\Admin\UpdateItemRequest;
use App\Http\Resources\Items\ItemResource;
use App\Models\Item;
use App\Services\Admin\ItemService;
use App\Services\Admin\TypeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    /**
     * @return void
     */
    public function __construct(
        protected ItemService $service,
        protected TypeService $typeService
    )
    {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $items = ItemResource::collection($this->service->latest());

        return view('admin.items.index', [
            'items' => $items
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $types = $this->typeService->all();

        return view('admin.items.create', [
            'types' => $types
        ]);
    }

    /**
     * @param StoreItemRequest $request
     * @return RedirectResponse
     */
    public function store(StoreItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.items.index')
            ->withSuccess(__('Item created successfully.'));
    }

    /**
     * @param Item $item
     * @return View
     */
    public function show(Item $item): View
    {
        return view('admin.items.show', [
            'item' => $item
        ]);
    }

    /**
     * @param Item $item
     * @return View
     */
    public function edit(Item $item): View
    {
        $types = $this->typeService->all();
        $itemTypeId = $this->service->edit($item);

        return view('admin.items.edit', [
            'item' => $item,
            'types' => $types,
            'itemTypeId' => $itemTypeId
        ]);
    }

    /**
     * @param UpdateItemRequest $request
     * @param Item $item
     * @return RedirectResponse
     */
    public function update(UpdateItemRequest $request, Item $item): RedirectResponse
    {
        $data = $request->validated();
        $this->service->update($item, $data);

        return redirect()->route('admin.items.index')
            ->withSuccess(__('Item updated successfully.'));
    }

    /**
     * @param Item $item
     * @return RedirectResponse
     */
    public function destroy(Item $item): RedirectResponse
    {
        $this->service->delete($item);

        return redirect()->route('admin.items.index')
            ->withSuccess(__('Item deleted successfully.'));
    }
}
