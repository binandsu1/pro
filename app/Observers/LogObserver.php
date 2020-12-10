<?php

namespace App\Observers;

use App\Jobs\logOption;
use Illuminate\Database\Eloquent\Model;

class LogObserver
{
    protected $auth;

    public function __construct()
    {
        $this->auth = auth('web');
    }

    function created(Model $model)
    {
        $auth = $this->auth;
        $data = [
            'act' => 'add',
            't_id' => $model->getKey(),
            'table' => $model->getTable(),
            'admin_id' => $auth->id(),
            'admin_name' => $auth->user()->name,
            'data' => json_encode($model->getAttributes())
        ];
        $this->pushJobSend($data);
    }

    public function updated(Model $model)
    {
        $auth = $this->auth;
        #修改后的数据
        $after = $model->getChanges();
        if ($after) {
            #修改前的数据
            $originals = $model->getOriginal();
            foreach ($after as $key => $value) {
                $before[$key] = $originals[$key];
            }
            $data = [
                'act' => 'update',
                't_id' => $model->getKey(),
                'table' => $model->getTable(),
                'admin_id' => $auth->id(),
                'admin_name' => $auth->user()->name,
                'befor_data' => json_encode($before),
                'data' => json_encode($after),
            ];
            $this->pushJobSend($data);
        }
    }

    public function deleting(Model $model)
    {
        $auth = $this->auth;
        $data = [
            'act' => 'delete',
            't_id' => $model->getKey(),
            'table' => $model->getTable(),
            'admin_id' => $auth->id(),
            'admin_name' => $auth->user()->name,
            'data' => json_encode($model->getAttributes()),
        ];
        $this->pushJobSend($data);
    }

    private function pushJobSend($data)
    {
        logOption::dispatchNow($data);
    }

}
