<?php

namespace Modules\Mongo\Models;

use Modules\System\Models\BaseMongo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MongData extends BaseMongo
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    protected $suffix = null;

    public function go($data){

        $year = date("Y");
        $id = $data["roundA"];
        $suffix = $id % 10;

       $last_id = self::suffix($year . '_' . $suffix)->insertGetId($data);
       return $last_id;

    }
    // 设置表后缀
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        if ($suffix !== null) {
            $this->table = $this->getTable() . '_' . $suffix;
        }
    }

    public function getSuffix()
    {
        return $this->suffix;
    }

    // 提供一个静态方法设置表后缀
    public static function suffix($suffix)
    {

        $instance = new static;
        $instance->setSuffix($suffix);
        return $instance->newQuery();
    }


}
