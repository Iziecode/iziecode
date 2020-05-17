<?php

namespace Iziedev\Iziecode\App\View\Component;

use Illuminate\View\Component;

class Form extends Component
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
    public $radioInline;
    public $checkboxInline;
    public $watch;
    public $ajaxUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($name,
                                $label = null,
                                $type = null,
                                $class = null,
                                $required = true,
                                $placeholder = null,
                                $value = null,
                                $options = [],
                                $hideAdd = null,
                                $hideEdit = null,
                                $method = null,
                                $attr = null,
                                $helperText = null,
                                $readonly = false,
                                $layout = false,
                                $formGroupAppend = '',
                                $formGroupPrepend = '',
                                $isValid = false,
                                $isInvalid = false,
                                $validateText = '',
                                $watch = false,
                                $ajaxUrl = ''
                            )
    {
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->class = $class;
        $this->required = $required;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->options = $options;
        $this->hideAdd = $hideAdd;
        $this->hideEdit = $hideEdit;
        $this->method = $method;
        $this->attr = $attr;
        $this->helperText = $helperText;
        $this->readonly = $readonly;
        $this->layout = $layout;
        $this->formGroupPrepend = $formGroupPrepend;
        $this->formGroupAppend = $formGroupAppend;
        $this->isInvalid = $isInvalid;
        $this->isValid = $isValid;
        $this->validateText = $validateText;
        $this->radioInline = $type == 'radio-inline' ? true : false;
        $this->checkboxInline = $type == 'checkbox-inline' ? true : false;
        $this->watch = $watch;
        $this->ajaxUrl = $ajaxUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        
        switch ($this->type) {
            case 'text' :
                return view(load_view('components.forms.input-text'));
            break;
            case 'select' : 
                return view(load_view('components.forms.input-select'));
            break;
            case 'radio' : 
                return view(load_view('components.forms.input-radio'));
            break;
            case 'radio-inline' : 
                return view(load_view('components.forms.input-radio'));
            break;
            case 'checkbox' : 
                return view(load_view('components.forms.input-checkbox'));
            break;
            case 'checkbox-inline' : 
                return view(load_view('components.forms.input-checkbox'));
            case 'passwords' : 
                    return view(load_view('components.forms.input-passwords'));
            break;
            case 'textarea' : 
                return view(load_view('components.forms.input-textarea'));
            break;
            default : 
                return view(load_view('components.forms.input-text'));
        }
            
    }

    public function isSelected($value){
        if($value == $this->value){
            return 'selected="selected"';
        }
    }

    public function isChecked($value){
        if(is_array($this->value)){
            $checked = '';
            foreach($this->value as $item){
                if($item == $value){
                    $checked = 'checked="checked';
                }
            }
            return $checked;
        }else{
            if($value == $this->value){
                return 'checked="checked';
            }
        }
        
    }
}
