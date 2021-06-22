<?php

namespace Modules\Laravel\Services;

use App\Services\XdoService;
use Illuminate\Support\Facades\Redis;


class RedisLimit extends XdoService
{
    private $_max;//最大配额
    private $_queue;//令牌桶名称
    private $_reids;//实例化reids

    public function __construct()
    {
        $this->_reids = new Redis();
        $this->_max = 20;
        $this->_queue = 'token_limit';
    }

    public function reset(){
        $this->_reids::del($this->_queue);
    }

    public function add($num)
    {
        #当前剩余令牌
         $curr_num = $this->_reids::llen($this->_queue);
        #最大令牌
         $max_num = $this->_max;
         $num = $max_num >= $curr_num+$num ? $num : $max_num-$curr_num ;
         echo "通容量".$max_num."---当前剩余".$curr_num."---要添加".$num;
        if($num > 0){
            for ($i = 1; $i <= $num; $i++) {
               $this->_reids::Lpush($this->_queue, $i);
            }
        }

    }

    public function get()
    {
        echo $this->_reids::llen($this->_queue);
        return $this->_reids::lPop($this->_queue) ? true : false;
    }
}

