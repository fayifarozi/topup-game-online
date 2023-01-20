<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $collection = 'admin';
    protected $fillable = [
        'name',
        'email',
        'image',
        'password'
    ];

    public function password(): Attribute
    {
        return new Attribute(
            set: fn($value) => Hash::make($value),
            get: fn($value) => $value
        );
    }
}
