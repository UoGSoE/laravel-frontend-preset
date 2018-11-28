<?php

namespace UoGSoE\LaravelPreset;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;

class PresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('uogsoe', function ($command) {
            Preset::install();

            $command->info('Preset installed. To finish setup, run:');
            $command->info('npm install && npm run dev');
        });
    }
}
