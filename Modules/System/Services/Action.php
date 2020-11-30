<?php
namespace Modules\System\Services;
use Modules\System\Models\XdoAction;

#继承了一个跟的services 定义一下公共的返回
class Action extends \App\Services\XdoService
{


   static protected $modules = [];

   static protected $controllers = [];

   static protected $codenames = [];



  /**
   * 权限、菜单生成时候排除掉的模块
   */
  protected static $exceptModules = [
    'admin', 'Widgets','Fortify','Jetstream','Sanctum','Controllers','Auth'
  ];

  /**
   * 所有的路由
   */
  protected $allAction = null;

  /**
   * 所有的dingo路由
   */
  protected $apiRoutes = null;

  /**
   * 获取所有的api
   */
  public function getApiRoutes()
  {
    # 找到所有api
    if ($this->apiRoutes == null) {
      $apiRouters = app('api.router')->getRoutes('v1');
      $routers = [];
      foreach ($apiRouters as $item) {
        $d = [
          'uri' => $item->uri,
          'method' => $item->methods[0],
          'controller' => get_class($item->controller),
          'action' => $item->controllerMethod
        ];
        $routers[] = $d;
      }
      $this->apiRoutes = collect($routers);
    }
    return $this->apiRoutes;
  }

  /**
   * 得到所有的
   */
  public function getAllRoutes()
  {
      $this->allRoutes = null;

    if ($this->allRoutes == null) {#
        #系统方法
      $allRouters = app('routes')->getRoutes();
//      dd($allRouters);
      //获得所有路由
      $routers = [];
      foreach ($allRouters as $item) {
          //获得路由名字
        $routeName = array_get($item->action, 'as');
        //控制器 方法分开
          if(empty($item->action['controller'])){
              continue;
          }
        $action = explode('@',$item->action['controller']);
//        dump($item->action['controller']."--".count($action));
        if(count($action) == 1){
            continue;
        }
        if ( $item->methods[0] !== 'POST') {
            array_pop($item->methods);
        }
        $d = [
          'uri' => $item->uri,
          'method' => implode('|',$item->methods),
          'controller' => $action[0],
          'action' => $action[1],
          'route' => $routeName,
        ];
        $routers[] = $d;
      }
      $this->allRoutes = collect($routers);
    }
    return $this->allRoutes;
  }

  /**
   * 获取route tree
   */
  public function getRouteTree()
  {
    $tree = XdoAction::fetchTree();
    return $tree;
  }

  /**
   * 获取以功能组区分的权限数据形式
   */
  public function getModuleWithAction()
  {
    $records = $this->getRouteTree();
    foreach ($records as &$module) {
      $actions = [];
      foreach ($module['children'] as $controllers) {
        foreach ($controllers['children'] as $action) {
          $actions[] = $action;
        }
      }
      $module['children'] = $actions;
    }

    return $records;
  }

  protected function parseControllerSection($controller)
  {
    $sections = explode('\\', $controller,5);
    // 略过app/http/controllers下的分析
    if ( $sections[0] == 'App') return [];

    $path = $sections[0];
    $module = $sections[1];
    $dir = implode('/', array_slice($sections, 2,-1) );
    $subController = explode('\\',end($sections),2);

    if ( count($subController) == 1 ) {
      $subdir = '';
      $controller = $subController[0];
    } else {
      $subdir = $subController[0];
      $controller = $subController[1];
    }

    return compact('path', 'module', 'dir', 'subdir', 'controller');
  }

  /**
   * 获取控制器文档
   */
  protected function fetchDocument($controller, $action = null)
  {
      $controllerObj = new \ReflectionClass($controller);
      if ($action == null) {
        $doc = $this->parseDocument($controllerObj->getDocComment());
      } else {
        $methodObj = $controllerObj->getMethod($action);
        $doc = $this->parseDocument($methodObj->getDocComment());
      }
      return $doc;
  }

  /**
   * 初始化入口
   */
  public function init()
  {
      #获取所有的控制器的路由
      $all = $this->getAllRoutes();
      $all->each(function ($item, $index) {
          $wc = $this->makeModule($item);
          list($mId, $section) = $wc;
          if ($mId !== false) {
            $cId = $this->makeController($item, $mId, $section);
            if ($cId !== false) {
              $this->makeAction($item, $mId, $cId, $section);
            }
      }
    });
    XdoAction::whereNotIn('codename', static::$codenames)->delete();
    \Cache::forget('adminActions');
    $this->getAdminActions();
    \Cache::forget('adminMenus');
    $this->getAdminMenus();
    \Cache::forget('adminNotAuthRoutes');
    $this->getNotAuth();
  }

  public function clearAll()
  {
    XdoAction::truncate();
  }

  /**
   * 模块分析
   */
  public function makeModule($route)
  {
//      dd($route);
    $sections = $this->parseControllerSection($route['controller']);
//    dd($sections);
    // 在app/http/controller/不写真实控制器 只写全局抽象控制器
    if ( empty($sections)) return [false, 1];
    #extract 玻璃出来
    extract($sections);
      if(in_array($module,static::$exceptModules)){
          return [false, 1];
      }
    $name = config(strtolower($module) . '.name', $module);
    $section = config(strtolower($module) . '.xdo_section', 1);
    $icon = config(strtolower($module) . '.icon', 'fa fa-w fa-circle-o');
    $color = config(strtolower($module) . '.icon_color');
    $orderBase = config(strtolower($module) . '.order_base', '1000');

    $id = array_get(static::$modules, $module);
    if ( $id ) {
        return [$id, $section];
    }

    $data = [
      'name' => $name,
      'icon' => $icon,
      'color' => $color,
      'order_base' => $orderBase,
      'section' => $section,
      'module' => $module,
      'codename' => $module,
      'type' => 'module',
      'parent_id' => 0
    ];
    static::$codenames[] = $data['codename'];
    $record = XdoAction::where('codename', $data['codename'])->first();
    if (!$record) {
      $record = XdoAction::create($data);
    } else {
      $record->fill($data)->save();
    }
    printf("处理模块: %s\n", $record->name);
    static::$modules[$module] = $record->id;
    return [$record->id, $record->section];
  }

  /**
   * 控制器分析
   */
  public function makeController($route, $moduleId, $sec=1)
  {
    $sections = $this->parseControllerSection($route['controller']);
    extract($sections);
    $codename = implode('/', array_filter([$module, $dir, $subdir, $controller]));

    $id = array_get(static::$controllers, $codename);
    if ( $id ) {
        return $id;
    }

    try {
      $doc = $this->fetchDocument($route['controller']);
    } catch(\Exception $e) {
        dump($e->getMessage());
        dump($route, $moduleID);
      die();
    }
    $name = array_get($doc[1], 'name.0', $controller);
    $name = explode(PHP_EOL, $name)[0];

    $unioncode = md5($module . $codename);

    $data = [
      'parent_id' => $moduleId,
      'name' => $name,
      'section' => $sec,
      'module' => $module,
      'codename' => $codename,
      'subdir' => $subdir,
      'controller' => $controller,
      'type' => 'controller',
      'parent_id' => $moduleId,
      'unioncode' => $unioncode
    ];
    static::$codenames[] = $data['codename'];
    $record = XdoAction::where('codename', $data['codename'])->first();
    if (!$record) {
      $record = XdoAction::create($data);
    } else {
      $record->fill($data)->save();
    }
    printf("处理控制器: %s\n", $record->name);
    static::$controllers[$codename] = $record->id;
    return $record->id;

  }

  /**
   * action分析
   */
  public function makeAction($route, $moduleId, $controllerId, $sec=1)
  {
    $sections = $this->parseControllerSection($route['controller']);
    extract($sections);

    $doc = $this->fetchDocument($route['controller'], $route['action']);

    $name = array_get($doc[1], 'name.0', $route['action']);
    $name = explode(PHP_EOL, $name)[0];

    $icon = array_get($doc[1], 'icon.0', 'fa fa-circle-o');
    $isMenu = array_get($doc[1], 'is_menu.0', 0);
    $isAuth = array_get($doc[1], 'is_auth.0', 1);

    $codename = $route['method'].' '.$route['uri'];
    $unioncode = md5($codename);

    $data = [
      'parent_id' => $controllerId,
      'name' => $name,
      'section' => $sec,
      'module' => $module,
      'method' => $route['method'],
      'codename' => $codename,
      'route' => $route['route'],
      'subdir' => $subdir,
      'controller' => $controller,
      'action' => $route['action'],
      'icon' => $icon,
      'is_auth' => $isAuth,
      'is_menu' => $isMenu,
      'type' => 'action',
      'unioncode' => $unioncode
    ];
    static::$codenames[] = $data['codename'];

    $record = XdoAction::where('codename', $data['codename'])->first();
    if (!$record) {
      $record = XdoAction::create($data);
    } else {
      $record->fill($data)->save();
    }

    $record->refresh();

    \Cache::forget($record->uri_key);
    \Cache::rememberForever($record->uri_key, function() use ($record) {
      return $record->toArray();
    });

    printf("处理动作: %s\n", $record->name);
    return $record->id;
  }


  /**
   * 得到所有的AdminAction
   */
  public function getAdminActions() {
    $menus = \Cache::rememberForever('adminActions', function() {
      return $this->genAdminActions();
    });
    return $menus;
  }

  /**
   * 生成所有admin action
   */
  public function genAdminActions() {
    $records = XdoAction::whereNotIn('module', static::$exceptModules)
                ->where('type', 'action')
                ->where('subdir', 'admin')
                ->get();
//获得所有后台（subdir admin）动作（action）
    $moduleNames = $records->pluck('module')->unique()->toArray();
//获得动作的模块
    $modules = XdoAction::whereIn('codename', $moduleNames)
                ->where('type', 'module')
                ->orderBy('order_base','ASC')
                ->get()->toArray();
//将所有动作根据模块分组
    $records = $records->groupBy('module')->toArray();
//将分好组的动作放入到相应的模块下
    foreach($modules as &$mod) {
      $mod['children'] = $records[$mod['codename']];
    }

    return $modules;
  }

  /**
   * 获取所有的菜单
   */
  public function getAdminMenus()
  {
    $menus = \Cache::rememberForever('adminMenus', function() {
      return $this->genAdminMenus();
    });
    return $menus;
  }

  /**
   * 生成菜单数据
   */
  public function genAdminMenus() {
    $menus = XdoAction::where('is_menu',1)->get();
    $moduleNames = $menus->pluck('module')->unique()->toArray();
    $modules = XdoAction::whereIn('codename', $moduleNames)
                        ->where('type', 'module')
                        ->orderBy('order_base','ASC')
                        ->get()->toArray();

    $menus = $menus->groupBy('module')->toArray();
    // TODO 菜单排序
    foreach($modules as &$mod) {
      $mod['children'] = $menus[$mod['codename']];
    }
    return $modules;
  }

  /**
   * 分析doc注释文档
   */
  public function parseDocument($comment)
  {
    $comment = str_replace(array("\r\n", "\n"), "\n", $comment);
    preg_match_all('/^\s*\* ?(.*)\n/m', $comment, $lines);

    $tags = array();

    $add_tag = function ($tag, $text) use (&$tags) {
      if ($tag !== 'access') {
        $tags[$tag][] = $text;
      }
    };

    $comment = $tag = null;
    $end = count($lines[1]) - 1;

    foreach ($lines[1] as $i => $line) {
      if (preg_match('/^@(\S+)\s*(.+)?$/', $line, $matches)) {
        if ($tag) {
          $add_tag($tag, $text);
        }

        $tag = $matches[1];
        $text = isset($matches[2]) ? $matches[2] : '';

        if ($i === $end) {
          $add_tag($tag, $text);
        }
      } elseif ($tag) {
        $text .= "\n" . $line;

        if ($i === $end) {
          $add_tag($tag, $text);
        }
      } else {
        $comment .= "\n" . $line;
      }
    }
    $comment = trim($comment, "\n");
    return array($comment, $tags);

  }

  /**
   * 获取不需要权限认证的控制器
   */
  public function getNotAuth() {
    $routes = \Cache::rememberForever('adminNotAuthRoutes', function() {
      return XdoAction::select('route')
                ->where('type', 'action')
                ->where('is_auth', 0)
                ->get()
                ->pluck('route')
                ->toArray();
    });
    return $routes;
  }

}
