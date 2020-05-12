<?php

namespace Iziedev\Iziecode\App\View\Component;

use Illuminate\View\Component;

class Icon extends Component
{
    public $type;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$type = null)
    {
        $this->type = $type == null ? config('iziecode.default-icon') : $type;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view(load_view('components.icon'));
    }
}
