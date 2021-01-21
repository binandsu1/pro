<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Mongo\Models\MongData;

class MongoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected  $i;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($i)
    {
        $this->connection = 'rabbitmq';
        $this->queue = 'MongJob';
        $this->i = $i;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $add = [];
        $add["name"] = "数据-".$this->i;
        $add["roundA"] = rand(100000, 999999);
        $add["roundB"] = rand(100000, 999999);
        $add["roundC"] = rand(100000, 999999);
        $add["roundD"] = rand(100000, 999999);
        $add["roundE"] = rand(100000, 999999);
        $add["roundF"] = rand(100000, 999999);
        $add["roundG"] = rand(100000, 999999);
        $add["roundH"] = rand(100000, 999999);
        $add["is_over"] = 0;
        $model = new MongData();
        $model->fill($add);
        $sa = $model->insertGetId($add);
        if($sa){
            $wosa = $model->find($sa);
            $wosa->is_over = 1;
            $wosa->save();
        }
    }
}
