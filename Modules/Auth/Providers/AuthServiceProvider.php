<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\System\Models\XdoRole;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Auth';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'auth';

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
    }

    public function hongzhiling(){

        $auth = auth('web');

        $auth->macro('role', function () use ($auth) {
            $role = $auth->user()->curr_role_id;
            $roles= XdoRole::find($role);
            return $roles;
        });


        /**
         * 获取当前用户菜单
         */
        $auth->macro('getAdminMenus', function() use ($auth){
            $retval = [];
            $role = $auth->role();
            if(empty($role)){
                $role = XdoRole::find(1);
            }
            $routes =   $role->routes;
            $isSuper = $auth->isSuper();
            if ( !$isSuper && !$routes ) return $retval;

            $menus = app('xdo.action')->getAdminMenus();
            $action = request()->action();
//            dd($action);
            # 高亮 TODO 稍后从写一遍
            foreach($menus as $menu) {
                #判断是当前的就高亮显示
                $menu['active'] = $menu['module'] == $action['module'] ? 1 : 0;
//                $menu['active'] = 1;
                $children = [];
                foreach($menu['children'] as $nav) {
                    $currRoute = $nav['route'];
//                    var_dump($currRoute);
                    #这个是jb判断权限的吧
//                    if ( $isSuper || in_array($currRoute, $routes) ) {
                    if ($isSuper || in_array($currRoute, $routes)) {
                        $nav['active'] = $nav['id'] == $action['id']? 1: 0;
                        $children[] = $nav;
                    }
                }
                if ( !empty($children) ) {
                    $menu['children'] = $children;
                    $retval[] = $menu;
                }

            }
            return $retval;
        });


        $auth->macro('isSuper', function () use ($auth) {
            static $isSuper = null;
                $user = $auth->user();
                if($user->curr_role_id == 1){
                    return  true;
                }
            return  false;
        });





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
}
