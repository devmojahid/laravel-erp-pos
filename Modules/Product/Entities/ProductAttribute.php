<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value', 'product_id'];

    protected $table = 'product_attributes';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductAttributeFactory::new();
    }

    public function getValueAttribute($value)
    {
        $unserialized = unserialize($value);
        $flattened = [];

        foreach ($unserialized as $key => $subArray) {
            if(is_array($subArray)) {
                foreach ($subArray as $subKey => $subValue) {
                    $flattened[] = $subValue;
                }
            }
        }

        return $flattened;
    }
}
