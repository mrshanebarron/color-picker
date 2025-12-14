<?php

namespace MrShaneBarron\ColorPicker;

use Illuminate\Support\ServiceProvider;

class ColorPickerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('ld-color-picker', Livewire\ColorPicker::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-color-picker');
    }
}
