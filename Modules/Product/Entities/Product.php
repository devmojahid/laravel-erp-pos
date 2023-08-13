<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
