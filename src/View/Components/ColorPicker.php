<?php

namespace MrShaneBarron\ColorPicker\View\Components;

use Illuminate\View\Component;

class ColorPicker extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('sb-color-picker::components.color-picker');
    }
}
