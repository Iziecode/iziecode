<?php

namespace Iziedev\Iziecode;

use Iziedev\Iziecode\Helpers\AppHelper;
use Illuminate\Support\Facades\Route;

/**
 * CLAS RENDER
 */
class Render
{
    private $label = "Label";
    private $class;
    private $name = "label";
    private $type = "text";
    private $required = "required";
    private $placeholder = "";
    private $value = "";
    private $option = [];
    private $hideAdd = false;
    private $hideEdit = false;
    private $method;
    private $attr;


    /**
     * @param atributes = array
     * @param data = array . if null = method add, if array = method edit
     */
    public static function form($atributes, $data = null)
    {
        $self = new Render;
        $self->method = $data == null ? 'add' : 'edit';

        foreach ($atributes as $key => $value) {
            $self->{$key} = $value;
        }

        return view(load_view('components.forms.render'),['name' => $self->name,'type' => $self->type,'label' => $self->label]);

    }
}
