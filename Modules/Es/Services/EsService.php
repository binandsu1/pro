<?php
namespace Modules\Es\Services;


use Elasticsearch\ClientBuilder;

class EsService {

    public $client;
    public function __construct()
    {
        #后续移动config
        $hosts = [
            [
                'host' => '124.70.81.74',
                'port' => '9200',
                'scheme' => 'http',
                'user' => 'esuser',
                'pass' => ''
            ]
        ];

        $this->client = ClientBuilder::create()->setHosts($hosts)->build();
    }

    #创建索引
    public function create_index($index_name){
        $params = [
            'index' => $index_name,
            'body' =>[
                'settings' => [
                    'number_of_shards' => 3,
                    'number_of_replicas' =>2
                ],
                'mappings'=>[
                    #默认鸳鸯村 true倒排索引
                    '_source'=>[
                        'enabled'=> true
                    ]
                ]

            ]
        ];
        $response = $this->client->indices()->create($params);
        return $response;
    }

    public function index_list($index_name = ''){

        if(!empty($index_name)){
            $params = ['index' => $index_name];
            return $this->client->indices()->getSettings($params);
        }
        return $this->client->indices()->getSettings();
    }

    public function index_del($index_name){
        $params = ['index' => $index_name];
        $response = $this->client->indices()->delete($params);
        return $response;
    }

    public function document_add($params){
        $response = $this->client->index($params);
        return $response;
    }

    public function document_list($document_name,$es=''){

        $searchBody = [
            "index" => $document_name,
            "body" => [
                "sort" => ["_id" =>"desc"],
//                "from" => $from,
                "size" => 100,
//                "track_total_hits" => true
            ]
        ];
        if($es){
            //and多字段查询  must
//            $searchBody["body"]["query"]["bool"]["must"][]["match"]["like"] = $es;
//            $searchBody["body"]["query"]["bool"]["must"][]["match"]["title"] = $es;
//            $searchBody["body"]["query"]["bool"]["must"][]["match"]["price"] = 12;

            //or 多字段查询 should
            $searchBody["body"]["query"]["bool"]["should"][]["match"]["title"] = $es;
            $searchBody["body"]["query"]["bool"]["should"][]["match"]["like"] = $es;
            $searchBody["body"]["query"]["bool"]["should"][]["match"]["price"] = intval($es);
            $searchBody["body"]["query"]["bool"]["should"][]["match"]["address"] = $es;

//            $searchBody["body"]["query"]["match"]["like"] = $es;
        }
//        dd($searchBody);
        return $this->client->search($searchBody);
    }

    public function document_del($my_index,$my_type,$my_id){
        $params = [
            'index' => $my_index,
            'type' => $my_type,
            'id' => $my_id
        ];
        $response = $this->client->delete($params);
        return $response;
    }

    public function document_update($data){

        $narr = [];
        $arr = explode(',',$data['body']);
        foreach ($arr as $k=>$v){
            $psarr = explode("=",$v);
            $narr[$psarr[0]] = $psarr[1];
        }
        $params = [
            'index' => $data['index'],
            'type' => $data['type'],
            'id' => $data['id'],
            'body' => [
                'doc' => $narr
            ]
        ];

        $response = $this->client->update($params);
        return $response;
    }

    public function document_info($params){
//        $params = [
//            'index' => 'my_index',
//            'type' => 'my_type',
//            'id' => 'my_id'
//        ];
        $response = $this->client->get($params);
        return $response;
    }


}
