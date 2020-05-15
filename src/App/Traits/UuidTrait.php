<?php

namespace Iziedev\Iziecode\App\Traits;

use Ramsey\Uuid\Uuid as Generator;

/**
 * 
 */
trait UuidTrait
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->{(new self)->getUiidField()} = (string) Generator::uuid4()->toString();
        });
    }

    public  function getUiidField()
    {
        return 'uuid';
    }

    public function getRouteKeyName(){
        return 'uuid';
    }
}
