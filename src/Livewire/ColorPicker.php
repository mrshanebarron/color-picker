<?php

namespace MrShaneBarron\ColorPicker\Livewire;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class ColorPicker extends Component
{
    #[Modelable]
    public string $value = '#3B82F6';
    
    public array $swatches = [];
    public bool $showInput = true;
    public string $format = 'hex';

    public function mount(
        string $value = '#3B82F6',
        array $swatches = [],
        bool $showInput = true,
        string $format = 'hex'
    ): void {
        $this->value = $value;
        $this->swatches = $swatches ?: [
            '#EF4444', '#F97316', '#EAB308', '#22C55E', '#14B8A6',
            '#3B82F6', '#8B5CF6', '#EC4899', '#6B7280', '#000000',
        ];
        $this->showInput = $showInput;
        $this->format = $format;
    }

    public function selectColor(string $color): void
    {
        $this->value = $color;
        $this->dispatch('color-changed', color: $color);
    }

    public function render()
    {
        return view('sb-color-picker::livewire.color-picker');
    }
}
