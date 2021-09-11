<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['reception_id','quantity_received','status'];
}
