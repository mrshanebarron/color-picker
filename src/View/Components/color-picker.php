<?php

namespace MrShaneBarron\color-picker\View\Components;

use Illuminate\View\Component;

class color-picker extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('ld-color-picker::components.color-picker');
    }
}
