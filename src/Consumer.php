<?php
namespace Chenruixuan;
// 通过offset和group来获取消息(必须设置group)
const KAFKA_OFFSET_STORED = RD_KAFKA_OFFSET_STORED;
// 从尾部开始获取新的massage
const KAFKA_OFFSET_END = RD_KAFKA_OFFSET_END;
// 从头部获取massage
const KAFKA_OFFSET_BEGINNING = RD_KAFKA_OFFSET_BEGINNING;



class KafKa_Consumer {

    protected $topic = null;

    protected $timeout = 10;

    protected $partition;

    /**
     * KafKa-Consumer 构造函数
     *
     * @param string             $BrokerList
     * @param \RdKafka\Conf      $KafKaConf
     * @param \RdKafka\TopicConf $TopicConf
     * @param string             $Topic
     */
    public function __construct($BrokerList, $KafKaConf, $TopicConf, $Topic) {

        $rk = new RdKafka\Consumer($KafKaConf);

        $rk->addBrokers($BrokerList);

        $this->topic = $rk->newTopic($Topic, $TopicConf);


    }

    public function setTimeout($timeout) {
        $this->timeout = $timeout;
    }

    /**
     * 开启Consumer
     *
     * @param     $partition
     * @param int $offset
     */
    public function consumerStart($partition = 0, $offset = KAFKA_OFFSET_STORED) {
        $this->partition = $partition;
        $this->topic->consumeStart($this->partition, $offset);
    }

    /**
     * 关闭consumer 断开连接
     */
    public function consumerStop() {
        $this->topic->consumeStop($this->partition);
    }


    /**
     * 每次获取单条Massage(多用于队列脚本)
     *
     * @return null|Kafka_Message
     * @throws KafKa_Exception_Base
     */
    public function consume() {
        $message = $this->topic->consume($this->partition, $this->timeout * 1000);
        switch ($message->err) {
            case RD_KAFKA_RESP_ERR_NO_ERROR:
                return $message;
                break;
            case RD_KAFKA_RESP_ERR__PARTITION_EOF:
                return null;
                break;
            default:
                throw new KafKa_Exception_Base($message->errstr(), $message->err);
                break;
        }
    }

    /**
     * 批量获取Massage
     *
     * @param int $partition
     * @param int $maxSize
     * @param int $offset
     *
     * @return array
     * @throws KafKa_Exception_Base
     */
    public function getMassage($partition, $maxSize, $offset = KAFKA_OFFSET_STORED) {

        $retList = array();

        $this->consumerStart($partition, $offset);
        for ($i = 0; $i < $maxSize; $i++) {
            $message = $this->consume();
            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR:
                    $retList[] = $message;
                    break;
                case RD_KAFKA_RESP_ERR__PARTITION_EOF:
                    break 2;
                default:
                    throw new KafKa_Exception_Base($message->errstr(), $message->err);
                    break;
            }
        }
        $this->consumerStop();
        return $retList;
    }

}
