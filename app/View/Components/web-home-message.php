<?php

namespace App\View\Components;

use Illuminate\View\Component;

class web-home-message extends Component
{
    public $titulo;
    public $mensaje;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mensaje, $titulo)
    {
        $this->titulo = $titulo;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.web-home-message');
    }
}
