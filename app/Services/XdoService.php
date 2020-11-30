<?php
namespace App\Services;

/**
 * 学大在线基础服务类
 */
abstract class XdoService {

    public static function returnSuccess($data = []){
        $errorCode = config('errorcode');
        return ['status'=>$errorCode['AJAXCODE']['ERR_OK']['code'],'msg'=>$errorCode['AJAXCODE']['ERR_OK']['msg'],'data'=>$data];
    }

    public static function returnError($msg = '',$status = 0,$data = []){
        $errorCode = config('errorcode');
        $status = $status?$status:$errorCode['AJAXCODE']['ERR_PUBLIC']['code'];
        $msg = $msg?$msg:$errorCode['AJAXCODE']['ERR_PUBLIC']['msg'];
        return compact('status','msg','data');
    }
}