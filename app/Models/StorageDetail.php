<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageDetail extends Model
{
    use HasFactory;

    protected $fillable = [

        'storage_id','product_id',
        'lot_number', 'lot_price',
        'quantity', 'location'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
