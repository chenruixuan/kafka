<?php
/**
 * User: chenruixuan
 * Date: 2017/1/12 下午3:06
 * Email: www@chenruixuan.com
 */
namespace Chenruixuan\Kafka;
class KafkaProducer {

    protected $topic = null;

    /**
     * 初始化Producer
     *
     * @param $BrokerList
     * @param $KafKaConf
     * @param $TopicConf
     * @param $Topic
     */
    public function __construct($BrokerList, $KafKaConf, $TopicConf, $Topic) {
        $rk = new \RdKafka\Producer($KafKaConf);
        $rk->addBrokers($BrokerList);
        $this->topic = $rk->newTopic($Topic,$TopicConf);
    }

    /**
     * 写入一条massage
     *
     * @param      $partition
     * @param      $value
     * @param null $key
     */
    public function setMessage($partition, $value, $key = null) {
        $this->topic->produce($partition, 0, $value, $key);
    }

}