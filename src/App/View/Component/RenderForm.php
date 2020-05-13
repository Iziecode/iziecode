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
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($attr)
    {
        // dd($attr);
        // TODO: buat logic dari method, hideadd, hide edit, attr, dan input group
        $this->label = isset($attr['label']) ? $attr['label'] : '' ;
        $this->type = isset($attr['type']) ? $attr['type'] : '' ;
        $this->name = isset($attr['name']) ? $attr['name'] : '' ;
        $this->class = isset($attr['class']) ? $attr['class'] : '' ;
        $this->required = isset($attr['required']) ? $attr['required'] : true ;
        $this->placeholder = isset($attr['placeholder']) ? $attr['placeholder'] : '' ;
        $this->value = isset($attr['value']) ? $attr['value'] : '' ;
        $this->options = isset($attr['options']) ? $attr['options'] : [];
        $this->hideAdd = isset($attr['hideAdd']) ? $attr['hideAdd'] : '' ;
        $this->hideEdit = isset($attr['hideEdit']) ? $attr['hideEdit'] : '' ;
        $this->method = isset($attr['method']) ? $attr['method'] : '' ;
        $this->attr = isset($attr['attr']) ? $attr['attr'] : '' ; 
        $this->helperText = isset($attr['helperText']) ? $attr['helperText'] : '' ; 
        $this->readonly = isset($attr['readonly']) ? $attr['readonly'] : false ; 
        $this->layout = isset($attr['layout']) ? $attr['layout'] : false ;
        $this->formGroupPrepend = isset($attr['form-group-prepend']) ? $attr['form-group-prepend'] : '';
        $this->formGroupAppend = isset($attr['form-group-append']) ? $attr['form-group-append'] : '';
        $this->isValid = isset($attr['is-valid']) ? $attr['is-valid'] : false;
        $this->isInvalid = isset($attr['is-invalid']) ? $attr['is-invalid'] : false;
        $this->validateText = isset($attr['validate-text']) ? $attr['validate-text'] : false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view(load_view('components.forms.render'));
    }
}
