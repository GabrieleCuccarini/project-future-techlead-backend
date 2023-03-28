<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Perfume extends Model
{
    protected $fillable = [
        'name', 
        'slug',
        'quantity',
        'brand',
        'cover_img',
        'price',
        'show',
    ];

    use HasFactory;

    public static function getSlug($name)
    {
                
        $slug = Str::slug($name);
        return $slug;

    }

}
