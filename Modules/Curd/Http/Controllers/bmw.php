<?php


namespace Modules\Curd\Http\Controllers;


class bmw implements car
{

    public $name;

    public function __construct($name = ''){
        $this->name = $name;
    }

    public function name($as = '')
    {
        echo $this->name = $as;
        echo '我是宝马dddss';
    }

    public function color()
    {
        echo '我是黑色';
    }
}
