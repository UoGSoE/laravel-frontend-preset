<?php

namespace UoGSoE\LaravelPreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset as BasePreset;
use Illuminate\Support\Arr;

class Preset extends BasePreset
{
    public static function install()
    {
        static::updatePackages();
        static::webpackDotMix();
        static::gitignore();
        static::bootstrapDotJs();
        static::appDotScss();
        static::views();
        static::routes();
    }

    protected static function updatePackageArray($packages)
    {
        return array_merge([
            "@sentry/browser" => "^4.3.0",
            "babel-plugin-syntax-dynamic-import" => "^6.18.0",
            "babel-preset-stage-2" => "^6.24.1",
            "bulma" => "^0.7.2",
            "eslint" => "^5.8.0",
            "eslint-plugin-vue" => "^5.0.0-beta.3",
            "portal-vue" => "^1.4.0",
            "vee-validate" => "^2.1.0-beta.11",
            "@fortawesome/fontawesome-free" => "^5.4.2",
            "moment" => "^2.22.0",
            "pikaday" => "^1.7.0",
        ], Arr::except($packages, [
            'bootstrap',
            'jquery',
            'lodash',
        ]));
    }

    protected static function webpackDotMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function gitignore()
    {
        copy(__DIR__ . '/stubs/gitignore-stub', base_path('.gitignore'));
    }

    protected static function bootstrapDotJs()
    {
        copy(__DIR__ . '/stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    protected static function appDotScss()
    {
        $files = new Filesystem;

        copy(__DIR__ . '/stubs/app.scss', resource_path('sass/app.scss'));
    }

    protected static function views()
    {
        $files = new Filesystem;

        $files->delete(resource_path('views/welcome.blade.php'));
        $files->exists($file = resource_path('views/home.blade.php')) && $files->delete($file);

        $files->copyDirectory(__DIR__ . '/stubs/views', resource_path('views'));
    }

    protected static function routes()
    {
        copy(__DIR__ . '/stubs/routes/web.php', base_path('routes/web.php'));
    }
}
