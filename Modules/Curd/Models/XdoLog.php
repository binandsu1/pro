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
        $date = $this->created_at;
        $act = $this->act;
        $table = $this->table;
        $t_id = $this->t_id;
        $type = "学生";
        $time = $this->getDateTime($date);
        if($act == 'add'){
            $str = $admin." 在 ".$date." 往 ".$table."表里 新增了一条".$type."数据";
        }
        if($act == 'update'){
            $str = $admin." 在 ".$date." 修改了一条id为 ".$t_id." 的".$type."数据";
        }
        if($act == 'delete'){
            $str = $admin." 在 ".$date." 一不小心删了一条id为 ".$t_id." 的".$type;
        }
        return $str;
    }

    public  function getDateTime(){

        $date = date('H');
        $text = "";

        if($date >= 0 && $date < 7){

            $text = "天还没亮，夜猫子，要注意身体哦！ ";

        }else if($date>=7 && $date<12){

            $text = "上午好！今天天气真不错……哈哈哈，不去玩吗？";

        }else if($date >= 12 && $date < 14){

            $text = "中午好！午休时间哦，朋友一定是不习惯午睡的吧？！";

        }else if($date >= 14 && $date < 18){

            $text = "下午茶的时间到了，休息一下吧！ ";

        }else if($date >= 18 && $date < 22){

            $text = "下午茶的时间到了，休息一下吧！ ";

        }else if($date >= 22 && $date < 24){

            $text = "很晚了哦，注意休息呀！";

        }

        return $text;

    }
}
