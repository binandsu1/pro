<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Curd\Models\XdoData;

class FakerUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         XdoData::factory(10)->create();
    }
}
