<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruc',
        'business_name',
        'contact_name',
        'email',
        'phone',
        'address'
    ];


    public function orders()
    {
        return $this->hasOne('App\Models\Order');
    }
}
