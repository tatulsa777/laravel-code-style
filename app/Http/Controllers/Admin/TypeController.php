<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTypeRequest;
use App\Http\Requests\Admin\UpdateTypeRequest;
use App\Http\Resources\Types\TypeResource;
use App\Models\Type;
use App\Services\Admin\TypeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @return View
     */
    public function index(): View
    {
        $types = TypeResource::collection($this->service->latest());

        return view('admin.types.index', [
            'types' => $types
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.types.create');
    }

    /**
     * @param StoreTypeRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTypeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.types.index')
            ->withSuccess(__('Type created successfully.'));
    }

    /**
     * @param Type $type
     * @return View
     */
    public function show(Type $type): View
    {
        return view('admin.types.show', [
            'type' => $type
        ]);
    }

    /**
     * @param Type $type
     * @return View
     */
    public function edit(Type $type): View
    {
        return view('admin.types.edit', [
            'type' => $type
        ]);
    }

    /**
     * @param UpdateTypeRequest $request
     * @param Type $type
     * @return RedirectResponse
     */
    public function update(UpdateTypeRequest $request, Type $type): RedirectResponse
    {
        $data = $request->validated();
        $this->type = $type;
        $this->service->update($type, $data);

        return redirect()->route('admin.types.index')
            ->withSuccess(__('Type updated successfully.'));
    }

    /**
     * @param Type $type
     * @return RedirectResponse
     */
    public function destroy(Type $type): RedirectResponse
    {
        $this->service->delete($type);

        return redirect()->route('admin.types.index')
            ->withSuccess(__('Type deleted successfully.'));
    }
}
