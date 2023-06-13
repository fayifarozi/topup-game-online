<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class HeroProduct extends Model
{
    use HasFactory;
    protected $collection = 'hero_product';
    protected $fillable = [
        'hero_id',
        'name',
        'path',
        'image',
        'category',
        'description',
        'status',
        'sold',
    ];

    public function product()
    {
        return $this->hasMany(Product::class,'hero_id','hero_id');   
    }

}

