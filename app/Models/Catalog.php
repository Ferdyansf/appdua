<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Catalog extends Model
{
    protected $table = 'catalog';

    protected $fillable = [
        'name_product',
        'price',
        'stock',
        'status',
        'category_id',
        'description',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
