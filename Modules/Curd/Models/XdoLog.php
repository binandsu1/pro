<?php

namespace Modules\Curd\Models;

use App\Models\XdoBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class XdoLog extends XdoBase
{
    use HasFactory,SoftDeletes;


    public function getLogDescAttribute(){
        $str = '--';
        $admin = $this->admin_name;
        $date = $this->getDateTime();
        $act = $this->act;
        $table = $this->table;
        $t_id = $this->t_id;
        $type = "学生";
        $time = $this->getDateTime($date);
        if($act == 'add'){
            $str = $date." ".$admin." 新增了一条id为 ".$t_id." 的".$type."数据";
        }
        if($act == 'update'){
            $str = $date." ".$admin." 修改了一条id为 ".$t_id." 的".$type."数据";
        }
        if($act == 'delete'){
            $str = $date." ".$admin." 删除了一条id为 ".$t_id." 的".$type."数据";
        }
        if($act == 'login'){
            $data = json_decode($this->data,true);
            $login_status  = $data["login_status"] ? " 成功" : " 失败";
            $str = $date." ".$admin." 尝试用密码 ".$data["password"]." 登陆".$login_status;
        }
        if($act == 'logout'){
            $str = $date." ".$admin." 退下了";
        }
        return $str;
    }

    public  function getDateTime(){

        $date_h = date("H",strtotime($this->created_at));
        $date = date("m月d日",strtotime($this->created_at));
        $text = "";

        if($date_h >= 0 && $date_h < 5){
            $text = "凌晨";
        }else if($date_h>=5 && $date_h<8){
            $text = "早上";
        }else if($date_h>=8 && $date_h<12){
            $text = "上午";
        }else if($date_h >= 12 && $date_h < 14){
            $text = "中午";
        }else if($date_h >= 14 && $date_h < 18){
            $text = "下午";
        }else if($date_h >= 18 && $date_h < 24){
            $text = "晚上";
        }
        return $date."的一个".$text;

    }
}
