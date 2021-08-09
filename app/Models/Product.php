<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'brand','description',
        'product_categories_id',
        'stock', 'unit_price',

    ];

    public function product_categories(){

        return $this->belongsTo('App\Models\ProductCategory');
    }
}
