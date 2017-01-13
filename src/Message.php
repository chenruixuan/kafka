<?php
/**
 * User: chenruixuan
 * Date: 2017/1/12 下午3:06
 * Email: www@chenruixuan.com
 */
namespace Chenruixuan\Kafka;
class Kafka_Message
{
    /**
     * @var int
     */
    public $err;

    /**
     * @var string
     */
    public $topic_name;

    /**
     * @var int
     */
    public $partition;

    /**
     * @var string
     */
    public $payload;

    /**
     * @var string
     */
    public $key;

    /**
     * @var int
     */
    public $offset;

    /**
     * @return string
     */
    public function errstr()
    {
    }
}
