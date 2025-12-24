<?php

namespace MrShaneBarron\ColorPicker\Livewire;

use Livewire\Component;

class ColorPicker extends Component
{
    public string $value = '#3b82f6';
    public bool $showInput = true;
    public array $swatches = [
        '#ef4444', '#f97316', '#eab308', '#22c55e', '#14b8a6',
        '#3b82f6', '#6366f1', '#8b5cf6', '#ec4899', '#6b7280',
    ];

    public function mount(
        string $value = '#3b82f6',
        bool $showInput = true,
        array $swatches = []
    ): void {
        $this->value = $value;
        $this->showInput = $showInput;
        if (!empty($swatches)) {
            $this->swatches = $swatches;
        }
    }

    public function selectColor(string $color): void
    {
        $this->value = $color;
    }

    public function render()
    {
        return view('sb-color-picker::livewire.color-picker');
    }
}
