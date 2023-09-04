<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'siren',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function(Brand $brand) {
            if (!$brand->siren){
                $brand->siren = "0000 0000 0000 0000";
            }
        });
    }


}
