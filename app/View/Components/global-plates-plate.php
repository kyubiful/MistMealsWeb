<?php

namespace App\View\Components;

use Illuminate\View\Component;

class global-plates-plate extends Component
{
    public $plato;
    public $styleContent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($plato, $styleContent = "")
    {
        $this->plate = $plato;
        $this->styleContent = $styleContent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.global-plates-plate');
    }
}
