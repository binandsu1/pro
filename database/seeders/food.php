<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class food extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'f_name'=>'西瓜',
                'f_num'=>'111',
                'f_price'=>'0.33',
            ],
            [
                'f_name'=>'苹果',
                'f_num'=>'111',
                'f_price'=>'0.53',
            ]
        ];
        DB::table('food')->insert($data);
    }
}
