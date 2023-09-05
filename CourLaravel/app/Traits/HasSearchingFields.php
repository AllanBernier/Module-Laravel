<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait HasSearchingFields
{
    public function scopeSearchingFields(Builder $query, string $search, array $fields)
    {
        foreach ( explode(' ', $search) as $word){
            $query->where(function($query) use ($fields, $word) {
                $query->where(DB::raw($fields[0]), 'like', "%{$word}%");
                foreach (array_slice($fields, 1) as $field){
                    $query->orWhere(DB::raw($field), 'like', "%{$word}%");
                }
            });
        }
        return $query;
    }
}




