<?php

namespace MrShaneBarron\color-picker;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\color-picker\Livewire\color-picker;
use MrShaneBarron\color-picker\View\Components\color-picker as Bladecolor-picker;
use Livewire\Livewire;

class color-pickerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-color-picker.php', 'sb-color-picker');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-color-picker');

        Livewire::component('sb-color-picker', color-picker::class);

        $this->loadViewComponentsAs('ld', [
            Bladecolor-picker::class,
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
