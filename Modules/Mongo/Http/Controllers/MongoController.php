<?php

namespace Modules\Mongo\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Jobs\MongoJob;
use App\Jobs\UserJob;
use Illuminate\Http\Request;
use Modules\Mongo\Models\MongData;

class MongoController extends AdminController
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
    public function list(Request $request)
    {
        $query = MongData::orderBy('id','desc');
        $list = $query->paginate(10)->appends($request->all());
        return view('mongo::list',compact('list'));
    }

    public function mongoadd(Request $request){
        $num = $request->input('num');
        if($request->method() == 'GET'){
            return view('mongo::mongo-add');
        }
        if($num > 20000){
            throw new \Exception('');
        }

        for($i=0;$i<=$num;$i++){
            MongoJob::dispatch($i);
        }
        return $this->returnSuccess();
    }
}
