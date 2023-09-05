<?php

namespace App\Models;

use App\Traits\HasUserId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory, HasUserId;


    protected $appends = [
        'full_name'
    ];

    protected $fillable = [
        'price',
        'brand_id',
        'title'
    ];



    public function getFullNameAttribute()
    {
        return $this->title . ' ,' . $this->brand->name;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }



}
