<?php

namespace Iziedev\Iziecode\App\Traits;

use Webpatser\Uuid\Uuid as Generator;

/**
 * 
 */
trait Uuid
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->{self::getRouteKeyName()} = (string) Generator::generate(4);
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
