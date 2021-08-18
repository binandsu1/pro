<?php


namespace Modules\Curd\Http\Controllers;


class bmw implements car
{

    public function name()
    {
        echo '我是宝马';
    }

    public function color()
    {
        echo '我是黑色';
    }
}
