<?php

namespace Modules\Curd\Models;

use App\Models\XdoBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class XdoData extends XdoBase
{
    use HasFactory,SoftDeletes;

    static public $excelHeaders = [
        'id' => 'ID',
        'name' => '姓名',
        'phone' => '手机号',
    ];
    public function toExcelData()
    {
        $data = [];
        foreach (static::$excelHeaders as $key => $field) {
                $value = $this->$key;
                $data[$field] = $value;
        }
        return $data;
    }
}
