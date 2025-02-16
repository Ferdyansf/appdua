<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = ['uid','end_date', 'start_date', 'duration', 'name_product', 'price', 'stock', 'status', 'category_id', 'description', 'image'];

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
}

