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
     * @name elastic-search
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
        $query = MongData::orderBy('updated_at','desc');
        $list = $query->paginate(10)->appends($request->all());
        $total_arr = [];
        $total_arr["success"] = MongData::where("is_over",1)->count();
        $total_arr["error"] = MongData::where("is_over",0)->count();
        return view('mongo::list',compact('list','total_arr'));
    }

    public function mongoadd(Request $request){
        $num = $request->input('num');
        if($request->method() == 'GET'){
            return view('mongo::mongo-add');
        }
        if($num > 20000){
            throw new \Exception('');
        }

        for($i=1;$i<=$num;$i++){
            MongoJob::dispatchNow($i);
        }
        return $this->returnSuccess();
    }
}
