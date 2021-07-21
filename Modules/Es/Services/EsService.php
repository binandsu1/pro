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

}
