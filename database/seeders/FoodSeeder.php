<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                'f_name'=>'西瓜',
                'f_num'=>'111',
                'f_price'=>'0.33',
        ];
        DB::table('food')->insert($data);
    }
}
