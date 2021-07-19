<?php

namespace Modules\Es\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EsController extends Controller
{
    /**
     * @name es介绍
     * @is_menu 1
     */
    public function index()
    {
        return view('es::index');
    }


}
