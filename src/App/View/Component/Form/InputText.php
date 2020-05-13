<?php

namespace Iziedev\Iziecode\App\View\Component\Form;

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
    public $hideAdd;
    public $hideEdit;
    public $method;
    public $attr;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($name,
                                $label = null,
                                $type = null,
                                $class = null,
                                $required = null,
                                $placeholder = null,
                                $value = null,
                                $hideAdd = null,
                                $hideEdit = null,
                                $method = null,
                                $attr = null
                            )
    {
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->class = $class;
        $this->required = $required;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->hideAdd = $hideAdd;
        $this->hideEdit = $hideEdit;
        $this->method = $method;
        $this->attr = $attr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view(load_view('components.form.input-text'));
    }
}
