<?php

namespace Modules\Es\Http\Controllers;

use Basemkhirat\Elasticsearch\Facades\ES;
use Elasticsearch\ClientBuilder;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;

class EsController extends AdminController
{
    /**
     * @name es介绍
     * @is_menu 1
     */
    public function index()
    {
        return view('es::index');
    }
    /**
     * @name es操作
     */
    public function curd()
    {
        $hosts = [
            [
                'host' => '124.70.81.74',
                'port' => '9200',
                'scheme' => 'http',
                'user' => 'esuser',
                'pass' => ''
            ]
        ];

        $client = ClientBuilder::create()->setHosts($hosts)->build();
        $esSer = app('xdo.es');
//        $a = $esSer->create_index('wwq');
        $list = $client->indices()->getSettings();
        dd($list);

        $list = ES::connection("default")
            ->index("myindex")
            ->type("mytype")
            ->get();
        return view('es::curd',compact('list'));
    }

    /**
     * @name 索引列表
     * @is_menu 1
     */
    public function indexList()
    {

        $esSer = app('xdo.es');
        $list = $esSer->index_list();
        $nlist = [];
        foreach ($list as $k=>$v){
            if(!empty($v["settings"])){
                $v["settings"]["index"]["creation_date"] = esTime($v["settings"]["index"]["creation_date"]);
                $nlist[] = $v["settings"]["index"];
            }
        }
        $alist = arraySort($nlist,'creation_date','desc');
        return view('es::index-list',compact('alist'));
    }

    public function indexAdd(Request $request){
        $name = $request->input('name');
        $esSer = app('xdo.es');
        $re = $esSer->create_index($name);
        return $re;
    }

    public function indexDel(Request $request){
        $name = $request->input('name');
        $esSer = app('xdo.es');
        $re = $esSer->index_del($name);
        return $re;
    }

    /**
     * @name 文档列表
     * @is_menu 1
     */
    public function documentIndex(){
        $esSer = app('xdo.es');
        $name = 'psf';
        $result = $esSer->document_list($name);
        $list = $result['hits']['hits'];
        return view('es::index-document',compact('list'));
    }

    public function documentAdd(Request $request){

        $para["index"] = $request->input('index');
        $para["type"] = $request->input('type');
        $para["id"] = $request->input('id');
        $str = $request->input('body');
        $esSer = app('xdo.es');
        $index_list = $esSer->index_list();

        if($request->method() == 'POST'){

            $ex_arr = explode(",",$str);
            $aa = [];
            foreach ($ex_arr as $k=>$v){
                $na = [];
                $na = explode("=",$v);
                $aa[$na[0]] = $na[1];
                $para["body"] = $aa;
            }
            $re = $esSer->document_add($para);
            $re["status"] = 9999;
            return $re;
        }

        return view('es::document-add',compact('index_list'));
    }


    public function documentEdit(Request $request){

        $data = $request->all();
        $esSer = app('xdo.es');

        if($request->method() == 'POST'){
            $re = $esSer->document_update($data);
            if($re["_seq_no"] > 0){
                return $this->returnSuccess();
            }
        }


        $document_info = $esSer->document_info($data);

        $para_str = "";
        foreach ($document_info["_source"] as $k=>$v){
            $para_str.= $k."=".$v.",";
        }
        $para_str = delLastStr($para_str);
        $data["para_str"] = $para_str;
        return view('es::document-edit ',compact('data'));



    }


    public function documentDel(Request $request){
         $my_index = $request->input('my_index');
         $my_type = $request->input('my_type');
         $my_id = $request->input('my_id');
         $esSer = app('xdo.es');
         $response = $esSer->document_del($my_index,$my_type,$my_id);
         return $response;

    }

}
