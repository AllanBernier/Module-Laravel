<?php

namespace App\Models;

use App\Traits\HasSearchingFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasSearchingFields;

    protected $fillable = [
        'name',
        'category',
        'price',
        'quantity',
    ];
}
