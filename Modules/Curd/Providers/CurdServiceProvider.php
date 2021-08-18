<?php

namespace Modules\Curd\Providers;

use App\Observers\LogObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Curd\Http\Controllers\bmw;
use Modules\Curd\Http\Controllers\car;
use Modules\Curd\Http\Controllers\dz;
use Modules\Curd\Models\XdoData;

class CurdServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Curd';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'curd';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        Paginator::useBootstrap();
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);



        //一种绑定形式 car接口 bmw里面的子类 好处是  里面的子类更换灵活
//        $this->app->singleton(car::class, function ($app) {
//            return $app->make(bmw::class);
//        });
        //简洁版
        $this->app->bind(car::class,bmw::class);
        $this->app->bind('asd',XdoData::class);


        //二种绑定形式 里面可以绑定一切 model service
        $this->app->singleton('xoddatamodel', function ($app) {
            return new XdoData();
        });

        //绑定一个实例 可以是数组 对象啥的
        $this->app->instance('ssss',[1,2,3]);

//        $this->app->resolving(function ($object, $app) {
//            dd($object);
//            var_dump($app);
//        });

    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
