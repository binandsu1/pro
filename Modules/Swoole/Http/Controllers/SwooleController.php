<?php

namespace Modules\Swoole\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SwooleController extends Controller
{
    /**
     * @name websocket
     * @is_menu 1
     */
    public function webSocket()
    {
        $fd =1;
        return view('swoole::admin.demo-sw');
    }

}
