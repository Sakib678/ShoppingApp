<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'title', 'price', 'producttype', 'product_type_id', 'is_admin', 'image'];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }


    
}
