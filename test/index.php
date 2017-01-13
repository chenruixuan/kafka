<?php
/**
 * User: chenruixuan
 * Date: 2017/1/12 下午3:06
 * Email: www@chenruixuan.com
 */
use Chenruixuan\Kafka\Kafka;
require __DIR__ . '/../autoload.php';

///producer
/*
$kafka=new Kafka("192.168.31.204");
$kafka->setTopic("test");
$producter=$kafka->newProducer();
$producter->setMessage(0,"helloworld");
*/
$kafka=new Kafka("192.168.31.204");
$kafka->setTopic("test");
$kafka->setGroup("test");
$consumer=$kafka->newConsumer();
$rs=$consumer->getMassage(0,10);



