<?php
/**
 * User: chenruixuan
 * Date: 2017/1/12 下午3:06
 * Email: www@chenruixuan.com
 */
use Chenruixuan\Kafka\Kafka;
require __DIR__ . '/../autoload.php';

///producer
//
//$kafka=new Kafka("192.168.31.204");
//$kafka->setTopic("hahaha");
//$producter=$kafka->newProducer();
//$producter->setMessage(0,"hahaha");

$kafka=new Kafka("192.168.31.204");

$kafka->setTopic("xuan");
$kafka->setGroup("test");
$consumer=$kafka->newConsumer();
try{
    $rs=$consumer->getMassage(0,4);
    var_dump($rs);
}catch (Exception $e){
    var_dump($e->getMessage());
}




