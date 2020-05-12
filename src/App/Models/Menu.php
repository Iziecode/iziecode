<?php

namespace Iziedev\Iziecode\App\Models;

use Illuminate\Database\Eloquent\Model;
use Iziedev\Iziecode\App\Traits\Uuid;

class Menu extends Model
{
    use Uuid;
    protected $table = 'menu';

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'route_name',
        'icon',
        'active_menu'
    ];

    protected $with = ['subMenu'];

    function parent()
    {
        return $this->belongsTo('Iziedev\Iziecode\App\Models\Menu', 'parent_id');
    }

    function subMenu()
    {
        return $this->hasMany('Iziedev\Iziecode\App\Models\Menu', 'parent_id');
    }

    function allChildren()
    {
        return $this->child()->with('allChildren');
    }
}
