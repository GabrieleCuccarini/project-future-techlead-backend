<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http\Models\Perfume;

class Brand extends Model
{
    protected $fillable = [
        'name', 
    ];

    use HasFactory;

    // Relazione inversa col model Perfume
    public function perfumes()
    {
        return $this->hasMany(Perfume::class);
    }
}