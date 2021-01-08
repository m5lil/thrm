<?php

namespace App\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{

    protected $files;
    protected $modules_path;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @param Filesystem $files
     * @return void
     */
    public function boot(Filesystem $files)
    {
        $this->files = $files;
        if (is_dir(app_path('Modules'))) {
            $this->modules_path = 'app/Modules/';
            $modules = array_map('class_basename', $this->files->directories(app_path('Modules')));
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }
    }

    protected function registerModule(string $module)
    {
        // for more info visit https://laravel.com/docs/master/packages
        $this->loadModuleWebRoutes($module);
        $this->loadModuleViews($module);
        $this->loadModuleTranslations($module);
        $this->loadModuleMigrations($module);
//        $this->loadModuleFactories($module);
    }

    protected function loadModuleWebRoutes($module)
    {
        if (file_exists(base_path() . '/' . $this->modules_path . $module . '/Routes/web.php')) {
            $this->loadRoutesFrom(base_path($this->modules_path . $module . '/Routes/web.php'));
        }
    }

    protected function loadModuleViews($module)
    {
        if (is_dir(base_path($this->modules_path . $module . '/Views'))) {
            $this->loadViewsFrom(base_path($this->modules_path . $module . '/Resources/Views'), strtolower($module));
        }
    }

    protected function loadModuleTranslations($module)
    {
        if (is_dir(base_path($this->modules_path . $module . '/Lang'))) {
            $this->loadJsonTranslationsFrom(base_path($this->modules_path . $module . '/Resources/Lang'));
            $this->loadTranslationsFrom(base_path($this->modules_path . $module . '/Lang'), $module);
        }
    }

    protected function loadModuleMigrations($module)
    {
        if (is_dir(base_path($this->modules_path . $module . '/Database/Migrations'))) {
            $this->loadMigrationsFrom(base_path($this->modules_path . $module . '/Database/Migrations'));
        }
    }

//    protected function loadModuleFactories($module)
//    {
//        if (is_dir(base_path($this->modules_path . $module . '/Database/Migrations'))) {
//            /** @scrutinizer ignore-call */
//            $this->loadFactoriesFrom(base_path($this->modules_path . $module . '/Database/Factories'));
//        }
//    }

}
