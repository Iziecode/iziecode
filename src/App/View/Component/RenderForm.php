<?php

namespace Iziedev\Iziecode\App\View\Component;

use Illuminate\View\Component;

class RenderForm extends Component
{
    public $name;
    public $label;
    public $type;
    public $class;
    public $required;
    public $placeholder;
    public $value;
    public $options;
    public $hideAdd;
    public $hideEdit;
    public $method;
    public $attr;
    public $helperText;
    public $readonly;
    public $layout;
    public $formGroupPrepend;
    public $formGroupAppend;
    public $isValid;
    public $isInvalid;
    public $validateText;
    public $watch;
    public $ajaxUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($props,$data = null)
    {
        // dd($props);
        // TODO: buat logic dari method, hideadd, hide edit, attr, dan input group
        

        $this->label = isset($props['label']) ? $props['label'] : '' ;
        $this->type = isset($props['type']) ? $props['type'] : '' ;
        $this->name = isset($props['name']) ? $props['name'] : '' ;
        $this->class = isset($props['class']) ? $props['class'] : '' ;
        $this->required = isset($props['required']) ? $props['required'] : true ;
        $this->placeholder = isset($props['placeholder']) ? $props['placeholder'] : '' ;
        $this->options = isset($props['options']) ? $props['options'] : [];
        $this->hideAdd = isset($props['hide-add']) ? $props['hide-add'] : '' ;
        $this->hideEdit = isset($props['hide-edit']) ? $props['hide-edit'] : '' ;
        $this->method = isset($props['method']) ? $props['method'] : '' ;
        $this->attr = isset($props['attr']) ? $props['attr'] : '' ; 
        $this->helperText = isset($props['helper-text']) ? $props['helper-text'] : '' ; 
        $this->readonly = isset($props['readonly']) ? $props['readonly'] : false ; 
        $this->layout = isset($props['layout']) ? $props['layout'] : false ;
        $this->formGroupPrepend = isset($props['form-group-prepend']) ? $props['form-group-prepend'] : '';
        $this->formGroupAppend = isset($props['form-group-append']) ? $props['form-group-append'] : '';
        $this->isValid = isset($props['is-valid']) ? $props['is-valid'] : false;
        $this->isInvalid = isset($props['is-invalid']) ? $props['is-invalid'] : false;
        $this->validateText = isset($props['validate-text']) ? $props['validate-text'] : false;
        $this->watch = isset($props['watch']) ? $props['watch'] : false;
        $this->ajaxUrl = isset($props['ajax-url']) ? $props['ajax-url'] : '';

        if($data == null){
            $this->value = isset($props['value']) ? $props['value'] : '' ;
        }else{
            $this->value = $data->name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // dd($this->value);
        return view(load_view('components.forms.render'));
    }
}
