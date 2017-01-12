<?php
namespace Chenruixuan\Kafka;
class KafKa_Producer {

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
        $rk = new RdKafka\Producer($KafKaConf);
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