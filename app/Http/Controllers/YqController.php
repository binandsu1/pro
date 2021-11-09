<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YqController extends Controller
{

    public function shiwei(){
        if('山东买房' and '三年结婚'){
            echo '拒绝';
        }else if('山东偷偷买房' and '三年结婚'){
            echo '拒绝';
        }else if('山东偷偷买房' and '一年结婚'){
            echo '同意';
        }else if('山东不买房' and '一年结婚'){
            echo '乐呵的';
        }else{
            echo '去求了';
        }

    }
    public function y(){

        $arr = ['a','b','c','d','e','f','g','h','i','g','k','l','m','n','o','p','q','r','s','t','u','v','w','s','y','z'];
        $url = 'https://www.yyjadmin.com/admin/';
//        $url = 'https://www.yyjadmin.com/laravel/index';
//        foreach ($arr as $k=>$v){
//            echo $v.'--';
//        }
        $last_arr = $this->para(2,$arr);
//        dd($last_arr);
        $result = [];
        foreach ($last_arr as $k=>$v){
            $fw_url = $url.$v;
            $psf  = get_headers($fw_url);
            $result[$fw_url]  = $psf[0];
        }
       dd($result);
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
