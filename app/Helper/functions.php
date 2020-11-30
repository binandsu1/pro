<?php

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Modules\Laravel\Models\XdoEnv;

#设置全局可用函数 记得在composer.json autoload里面写 然后执行命令 dumoautoload 使文件生效
#静态文件地址
function static_url($path){
    return asset('/static/' . $path);
}

#ifelse
function ifelse($is, $v1, $v2 = '')
{
    return $is ? $v1 : $v2;
}

#统一返回数据
function return_data($data,$key){
    return  empty($data) ? '' : isset($data->$key) ? $data->$key : '';
}

#下拉
function genOptions($arr, $selected = null, $exclude_arr = array()){
    $tpl = '<option value="%s">%s</option>';
    $tplSelect = '<option value="%s" selected>%s</option>';
    $retval = [];
    foreach ($arr as $key => $value) {
        if (!in_array($value, $exclude_arr)) {
            if ($key == $selected) {
                $retval[] = sprintf($tplSelect, $key, $value);
            } else {
                $retval[] = sprintf($tpl, $key, $value);
            }
        }
    }
    return implode('\n', $retval);
}

#调试文案
function getSqlShow(){
    $logs = Cache::pull('logs');
    if (!empty($logs)){
        $status = '正常';
        foreach ($logs as $k=>$v){
            if($v["time"] < 1){
                $status = '正常';
            }
            if($v["time"] > 1 && $v["time"]<2){
                $status = '微卡';
            }
            if($v["time"] > 2 ){
                $status = '卡顿';
            }
            if($v["time"] > 5 ){
                $status = '严重卡顿';
            }
            if($k != 0){
                echo "<hr>";
            }
            echo "语句&nbsp;&nbsp;".$v["sql"]."<br>";
            echo "时间&nbsp;&nbsp;".$v["time"]."&nbsp; 秒<br>";
            echo "路径&nbsp;&nbsp;".$v["path"]."<br>";
            echo "地址&nbsp;&nbsp;".$v["url"]."<br>";
            echo "状态&nbsp;&nbsp;".$status."<br>";
        }
    }
    Cache::forget('logs');
}

#调试状态 1开启 2关闭
function getDebugStatus(){
    $debug = Xdoenv::where('name','debug')->first();
    return $debug->status;
}

#二维数组指定字段去重
function uniquArr($array,$para){
    $result = array();
    foreach($array as $k=>$val){
        $code = false;
        foreach($result as $_val){
            if($_val[$para] == $val[$para]){
                $code = true;
                break;
            }
        }
        if(!$code){
            $result[]=$val;
        }
    }
    return $result;
}


function array_get($array, $key, $default = null)
{
    return Arr::get($array, $key, $default);
}

function str_limit($value, $limit = 100, $end = '...')
{
    return Str::limit($value, $limit, $end);
}

