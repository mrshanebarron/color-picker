<?php

namespace MrShaneBarron\ColorPicker;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\ColorPicker\Livewire\ColorPicker;
use MrShaneBarron\ColorPicker\View\Components\ColorPicker as BladeColorPicker;

class ColorPickerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-color-picker.php', 'sb-color-picker');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-color-picker');

        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-color-picker', ColorPicker::class);
        }

        $this->loadViewComponentsAs('ld', [
            BladeColorPicker::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sb-color-picker.php' => config_path('sb-color-picker.php'),
            ], 'sb-color-picker-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/sb-color-picker'),
            ], 'sb-color-picker-views');
        }
    }
}
