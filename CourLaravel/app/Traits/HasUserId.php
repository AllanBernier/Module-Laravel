<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
trait HasUserId
{

    protected static function bootHasUserId()
    {
        static::creating( function ($model) {
            $model->user_id = Auth::user()->id;
        });

        static::addGlobalScope('user_id_scope', function (Builder $builder) {
            $builder->whereUserId(Auth::user()->id);
        });
    }

}




