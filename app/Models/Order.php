<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'user_id',
        'date_current',
        'date_required',
        'supplier_id',
        'status'
    ];
    public function supplier(){

        return $this->belongsTo('App\Models\Supplier');
    }
}
