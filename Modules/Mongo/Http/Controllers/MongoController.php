<?php

namespace Modules\Mongo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mongo\Models\MongData;

class MongoController extends Controller
{
    /**
     * @name mongo-介绍
     * @is_menu 1
     */
    public function index()
    {
        return view('mongo::index');
    }

    /**
     * @name mongo-数据
     * @is_menu 1
     */
    public function list()
    {
        $list = MongData::get();
        dd($list);
        return view('mongo::list');
    }
}
