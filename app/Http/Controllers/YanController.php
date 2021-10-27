<?php
namespace App\Http\Controllers;

use App\Jobs\logOption;
use App\Jobs\sendJpush;
use App\Jobs\zzz;
use function GuzzleHttp\Psr7\build_query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Client\Models\XdoTestJob;
use Modules\System\Models\XdoJpushBind;
use Modules\System\Services\JPushSer;
use Modules\User\Models\LvUser;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;
use App\Jobs\YYJ;

class YanController extends \App\Http\Controllers\Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
  {
//      顺丰速运	SF
//百世快递	HTKY
//中通快递	ZTO
//申通快递	STO
//圆通速递	YTO
//韵达速递	YD
//邮政快递包裹	YZPY
//EMS	EMS
//天天快递	HHTT
//京东快递	JD
//优速快递	UC
//德邦快递	DBL
//宅急送	ZJS

      $kdSer = app('xdo.KdSer');

      # 即时查询API 8001
         $requestData= "{'OrderCode':'','ShipperCode':'SF','LogisticCode':'SF1026773906979','CustomerName':'1833'}";
//                 $requestData= "{'OrderCode':'','ShipperCode':'HTKY','LogisticCode':'552017866123939'}";
//                 $requestData= "{'OrderCode':'','ShipperCode':'ZTO','LogisticCode':'75377535312587'}";
      $logisticResult=$kdSer->request('getOrderTracesByJson', $requestData,2002);

      dd($logisticResult);

      #物流跟踪API
      $requestData="{'OrderCode': 'SF201608081055208281',".
          "'ShipperCode':'HTKY',".
          "'LogisticCode':'552017866123939',".
          "'PayType':1,".
          "'ExpType':1,".
          "'IsNotice':0,".
          "'Cost':1.0,".
          "'OtherCost':1.0,".
          "'Sender':".
          "{".
          "'Company':'LV','Name':'Taylor','Mobile':'15018442396','ProvinceName':'上海','CityName':'上海','ExpAreaName':'青浦区','Address':'明珠路73号'},".
          "'Receiver':".
          "{".
          "'Company':'GCCUI','Name':'Yann','Mobile':'15018442396','ProvinceName':'北京','CityName':'北京','ExpAreaName':'朝阳区','Address':'三里屯街道雅秀大厦'},".
          "'Commodity':".
          "[{".
          "'GoodsName':'鞋子','Goodsquantity':1,'GoodsWeight':1.0}],".
          "'Weight':1.0,".
          "'Quantity':1,".
          "'Volume':0.0,".
          "'Remark':'小心轻放'}";
      $logisticResult=$kdSer->request('orderTracesSubByJson', $requestData);


      dd($logisticResult);
      echo 1;die;


      // 表明服务器启动后监听本地 9051 端口
      $server = new swoole_http_server('127.0.0.1', 9501);

// 服务器启动时返回响应
        $server->on("start", function ($server) {
            echo "Swoole http server is started at http://127.0.0.1:9501\n";
        });

// 向服务器发送请求时返回响应
// 可以获取请求参数，也可以设置响应头和响应内容
        $server->on("request", function ($request, $response) {
            $response->header("Content-Type", "text/plain");
            $response->end("Hello World\n");
        });

// 启动 HTTP 服务器
        $server->start();
        die;

      echo phpinfo();die;
//      s_id = 352208 and
      $sql = "SELECT o_id,obj_id,s_id,cls_times,buy_times,give_times,`status`,money,count(*) as con from lv_order where order_type IN (250,253,350,353) and created_at > '2020-02-01 00:00:00' and   `status` > 0 GROUP BY s_id,obj_id HAVING con > 1  order by o_id desc limit 100";
      $re =  DB::select($sql);
//      dd($re);
        foreach ($re as $k=>$v){
            $sqlz = "";
            $sqlz = "SELECT o_id,obj_id,s_id,cls_times,buy_times,give_times,`status`,money from lv_order where  s_id = $v->s_id  and obj_id = $v->obj_id  order by o_id desc";
            $rez[$v->s_id] =  DB::select($sqlz);
        }


        echo json_encode($rez);


//      env QUEUE_CONNECTION
//      ./artisan make:job zzz
//      ./artisan queue:work redis --queue=xdoYyj

//      logOption::dispatch(json_encode(['sdf'=>'test']))->onConnection('rabbitmq')->onQueue('xdoLogOption');
//
//      die;

//       $table = new XdoTestJob();
//       $result = $table->find(5);
//        zzz::dispatch()->onConnection('redis')->onQueue('zzz');die;  rabbitmq


        for($i=0;$i<1000;$i++){
            $data["name"] = $i;
            $data["status"] = 1;
            $data["i"] = $i;
             YYJ::dispatch($data)->onConnection('rabbitmq')->onQueue('xdoYyj');
        }

        die;
      #极光推送
      #获取别名下设备 - 新增  底层方法都在 直接调取就可以   传入 类名 api参数
      #  接口分类
      #push         推送类    推送方式 1-全部广播 2-标签 3-别名 4-注册id
      #report       获取统计数据类
      #devices      操作 标签 别名类
      #schedule     定时任务推送类
      #file         文件上传推送类
      #admin        后台创建App上传证书类

      $jpushSer = app('xdo.JPushSer');

      $params['alias'] = 'xdoUid50706';
//      $params['regId'] = '1517bfd3f74471d891c';
      $params['platform'] = 'ios';
//      $params['allAudience'] = '11'; 填写了就广播 不填 有啥穿啥 tag alias regId
      $params['title'] = '恭喜您中奖500万';
      $params['content'] = '恭喜您中奖500万！！！';
//      $params['tags'] = 'tag1';
//      $params['tags'] = ['tag1','tag2','tag3','tag3'];
//      $params['addTags'] = ['tag4','tag5'];
//      $params['removeTags'] = ['tag1','tag22222'];

      $push = app('xdo.JPushSer');

      $user = LvUser::find(8836);
      //别名和设备在离线的时候都可以推送  精确到别名就没问题了
//        $data = $push->request('device','getDevices',$params);
        $data = $push->request('push','push',$params);
        dd($data);
###################################  DEVICE  ###########################################################################

       #用户设备启动的时候 传过来 regId 存入 xdo_jpush_binds 表
        $regId = $params['regId'];
        $data["reg_id"] = '1517bfd3f74471d891c';
        $result = XdoJpushBind::where("reg_id",$regId)->count();
        if($result == 0){
            XdoJpushBind::insert($data);
        }
        die;

        #用户第一次登陆 传入 uid regId 关联信息 先查询有没有数据 如果设备ID和用户ID对的上 就不用更新记录  然后每次更新年级和更新校区的时候 我在更新这个用户的tag
        $params['regId'] = $params['regId'];
        $params["u_id"] = $user;
        $result = XdoJpushBind::where("reg_id",$params['regId'])->where("uid",$user->u_id)->count();
        if($result < 1){
            $data = $push->devicesApi('updateDevice',$params);
        }


        #当学生发生校区变换和年级变化的时候  按照学生uid更新tag
//        $params["u_id"] = 8836;
//        $result = XdoJpushBind::where("uid",$user->u_id)->orderBy('id',desc)->first();
//        $params['regId'] = $result->reg_id;
//        if($params['regId']){
//            $data = $push->devicesApi('updateDevice',$params);
//        }








    // 更新指定设备的别名与标签

    // 更新 Alias
//            $device->updateAlias($registration_id, 'alias');
//    // 添加 tag, 支持字符串和数组两种参数
//            $device->addTags($registration_id, 'tag');
//    // OR
//            $device->addTags($registration_id, ['tag1', 'tag2']);
//    // 移除 tag，支持字符串和数组两种参数
//            $device->removeTags($registration_id, 'tags');
//    // OR
//            $device->removeTags($registration_id,  ['tag1', 'tag2']);
//    // 清空所有 tag
//            $device->clearTags($registration_id);
//
//    // 更新 mobile
//            $device->updateMoblie($registration_id, '13800138000');
//    // 取消手机绑定
//            $device->clearMobile($registration_id);
//
//    // getDevicesStatus($registrationId)
//    // 获取在线用户的登录状态（VIP专属接口）,支持字符串和数组两种参数
//            $device->getDevicesStatus('rid');
//    // OR
//            $device->getDevicesStatus(['rid1', 'rid2']);







//      推送             传 platform  audience title content alias/regId/tag
//      $data = $push->request('push','push',$params);

###################################  DEVICE  ###########################################################################
#
//      获取设备信息      根据registrationId get tags alias mobile  传regId
//        $data = $push->request('device','getDevices',$params);

//      修改设备别名      根据registrationId   传regId alias
//      $data = $push->request('device','updateAlias',$params);

//      修改设备别名/tag        传 $registrationId, $alias = null, $mobile = null, $addTags = null, $removeTags = null
//      $data = $push->request('device','updateDevice',$params);
//      判断设备与标签绑定关系    传 $registrationId, $tag
//      $data = $push->request('device','isDeviceInTag',$params);


###################################  TAG  ##############################################################################

//      获取所有tag
//      $data = $push->request('device','getTags',$params);

//      添加设备tag      传regId tags  //自动去重和已有的
//      $data = $push->request('device','addTags',$params);

//      删除设备tag      传regId tags
//      $data = $push->request('device','removeTags',$params);

//      删除设备所有tag   传regId
//      $data = $push->request('device','clearTags',$params);

###################################  TAG  ##############################################################################








       dd($data);





        //获取老师教案数据
//        $id = $request->input("id");
//        $result = LvCourseware::find($id);
//        $test = LvUser::with(['userAppend.qudao'])->where('u_id',33)->first();//用户渠道
        //模拟写一个获取老师下所有渠道2807
//        dd(config());
//        $test = LvTeacher::with(['qudao'])->where('t_id',2807)->first();//用户渠道
//        return $test;
//        echo 1;


        $url = 'https://online.xuedaclass.com/h5/user/tianqi?share_type=admin&share_uid=1804';
        $route='h5.free2020';
        $url = route($route, ['user_type' =>'admin', 'u_id' => 1555, 'grade'=>0,'subject'=>0,'subjectExt'=>'Anhui']);


        $qrcode =  QrCode::format('png')->margin(0)->size(200)->generate($url);
        $qrcode = Image::make($qrcode);


        $qrcode = $qrcode->resize(198,198);
        //海报原型图
//        $imgsoure = public_path('static').'/h5/image/poster/free2020exam.jpg';
        $imgsoure = public_path('static').'/h5/image/poster/training2020.jpg';

        $img =Image::make($imgsoure);
        //生成头像
        $img1 =Image::make('../storage/tmp/onEcq6AVwsyLGGq7zWsVPmQ4Y-4shead.jpg')->resize(121,121);
        $headimg= Image::canvas(121,121)->fill('rgba(0, 0, 0, 0)');
        $r=$img1->width() /2;
        for($x=0;$x<$img1->width();$x++) {
            for ($y = 0; $y < $img1->height(); $y++) {
                $c = $img1->pickColor($x, $y, 'array');
                if (((($x - $r) * ($x - $r) + ($y - $r) * ($y - $r)) < ($r * $r))) {
                    $headimg->pixel($c, $x, $y);
                }
            }
        }
        //生成文字
        $img->text(mb_substr('的说法的',0,3,'utf-8'), 185,65, function($font) {
            $font->file(app_path('../resources/font/vista.ttf'));
            $font->size(23);
            $font->color('#ffffff');
            $font->valign('top');
        });
        $img->insert($headimg,'top-left',40,20);
        $img->insert($qrcode,'bottom-right',42,55);
        $path=('../storage/tmp/5.jpg');
        $img->save($path);

  }

}
