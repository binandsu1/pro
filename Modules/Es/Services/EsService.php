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
            'index' => $index_name
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

    public function document_list($document_name){
        $searchBody = [
            "index" => $document_name,
            "body" => [
                "sort" => ["_id" =>"desc"],
//                "from" => $from,
                "size" => 100,
//                "track_total_hits" => true
            ]
        ];
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


}
