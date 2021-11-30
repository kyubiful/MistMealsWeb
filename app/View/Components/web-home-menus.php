<?php

namespace App\View\Components;

use Illuminate\View\Component;

class web-home-menus extends Component
{

    public $objetivo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($objtivo)
    {
        $this->objetivo = $objetivo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.web-home-menus');
    }
}
