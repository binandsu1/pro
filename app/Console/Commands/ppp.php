<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ppp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yan:ppp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $arr = ['a','b','c','d','e','f','g','h','i','g','k','l','m','n','o','p','q','r','s','t','u','v','w','s','y','z'];
        $url = 'https://www.yyjadmin.com/admin/';
//        $url = 'https://www.yyjadmin.com/laravel/index';
//        foreach ($arr as $k=>$v){
//            echo $v.'--';
//        }
        $last_arr = $this->para(1,$arr);
//        dd($last_arr);
        $result = [];
        foreach ($last_arr as $k=>$v){
            $fw_url = $url.$v;
            $psf  = get_headers($fw_url);
            $result[$fw_url]  = $psf[0];

            if(strpos($psf[0],'404') !== false){
                $this->error($fw_url.'   扫描结果   '.$psf[0]);
            }

            if(strpos($psf[0],'200') !== false){
                $this->info($fw_url.'   扫描结果   '.$psf[0]);
            }
        }
        $arr200 = [];
        $arr302 = [];
        $arr404 = [];
        foreach ($result as $k=>$v){
            if(strpos($v,'200') !== false){
                $arr200[] = $k;
            }
            if(strpos($v,'302') !== false){
                $arr302[] = $k;
            }
            if(strpos($v,'404') !== false){
                $arr404[] = $k;
            }
        }
        $this->line('全部扫描结束 200 数量 '.count($arr200)." 个");
        $this->line('全部扫描结束 302 数量 '.count($arr302)." 个");
        $this->line('全部扫描结束 404 数量 '.count($arr404)." 个");
       
    }

    function para($num,$arr=[]){
        $para_arr = [];
        if($num == 1){
            foreach ($arr as $k=>$v){
                $para_arr[] = $v;
            }
        }
        if($num == 2){
            foreach ($arr as $k=>$v){
                foreach ($arr as $k2=>$v2) {
                    $para_arr[] = $v.$v2;
                }
            }
        }
        if($num == 3){
            foreach ($arr as $k=>$v){
                foreach ($arr as $k2=>$v2) {
                    foreach ($arr as $k3=>$v3) {
                        $para_arr[] = $v.$v2.$v3;
                    }
                }
            }
        }

        if($num == 4){
            foreach ($arr as $k=>$v){
                foreach ($arr as $k2=>$v2) {
                    foreach ($arr as $k3=>$v3) {
                        foreach ($arr as $k4=>$v4) {
                            $para_arr[] = $v.$v2.$v3.$v4;
                        }
                    }
                }
            }
        }

        if($num == 5){
            foreach ($arr as $k=>$v){
                foreach ($arr as $k2=>$v2) {
                    foreach ($arr as $k3=>$v3) {
                        foreach ($arr as $k4=>$v4) {
                            foreach ($arr as $k5=>$v5) {
                                $para_arr[] = $v.$v2.$v3.$v4.$v5;
                            }
                        }
                    }
                }
            }
        }

        return $para_arr;

    }
}
