<?php

namespace Modules\Laravel\Services;

use App\Services\XdoService;
use Illuminate\Support\Facades\Log;
use Modules\Laravel\Models\XdoJobData;


class Jobdata extends XdoService
{
    public function process($i){
        $data['num'] = rand(10000, 99999);
        $data['name'] = rand(100000, 999999);
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        $data['i'] = $i;
        $id = XdoJobData::insertGetId($data);
        if($id>0){
            $one = XdoJobData::find($id);
            $one->is_over = 1;
            $sult = $one->save();
            log::info($sult);
        }
    }
}