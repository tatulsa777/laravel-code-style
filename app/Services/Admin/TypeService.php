<?php

namespace App\Services\Admin;

use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Type::all();
    }

    /**
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        Type::create($data);
    }

    /**
     * @param Type $type
     * @param array $data
     * @return void
     */
    public function update(Type $type, array $data): void
    {
        $type->update($data);
    }

    /**
     * @param Type $type
     * @return void
     */
    public function delete(Type $type): void
    {
        $type->delete();
    }
}
