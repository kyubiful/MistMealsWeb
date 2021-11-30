<?php

namespace App\View\Components;

use Illuminate\View\Component;

class web-home-sodexo-cobee-banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.web-home-sodexo-cobee-banner');
    }
}
