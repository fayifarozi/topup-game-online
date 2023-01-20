<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $collection = 'product';
    protected $fillable = [
        'game',
        'kode_id',
        'item',
        'price',
        'status'
    ];
    // public function getRouteKeyName()
    // {
    //     return 'kode_id';
    // }
}
