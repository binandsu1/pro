<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{

    public $route;
    public $size;
    public $type;
    public $icon;
    public $bname;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route,$size,$type,$icon,$bname)
    {
        $this->route = $route;
        $this->size = $size;
        $this->type = $type;
        $this->icon = $icon;
        $this->bname = $bname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
