<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'name',
        'price'
    ];

    /**
     * Item type
     * @return HasOne
     */
    public function type(): HasOne
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
