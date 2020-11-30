<?php

namespace Modules\Admin\Providers;

use App\View\Components\Button;
use App\View\Components\Shi;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Admin';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'admin';

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
        $this->hongzhiling();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        $this->registerComponents();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
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

    # 宏指令
    #
    #roleDesc
    #roles


    public function hongzhiling()
    {
        $auth = auth('web');
        $auth->macro('isFull', function () use ($auth) {
            return true;
        });
        $auth->macro('isRealSuper', function () use ($auth) {
            return true;
        });
        $auth->macro('roleDesc', function () use ($auth) {
            return true;
        });
        $auth->macro('roles', function () use ($auth) {
            return [];
        });
    }
#https://xueyuanjun.com/post/21987 写页面组件别名的这里是
    public function registerComponents() {
        #laravel 8 写法
        Blade::component('components.search', 's');


//          Blade::component('components:search', 'adminSearch');
//        Blade::component('admin::components.search', 'adminSearch');
//        Blade::component('admin::components.search', 'adminSearch');
//         Blade::component('admin::components.btn', 'adminBtn');
//        Blade::component('user::components.sidebar', 'userSidebar');
//        Blade::component('teacher::components.sidebar', 'teacherSidebar');

    }


}
