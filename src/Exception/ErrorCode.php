<?php
/**
 * User: chenruixuan
 * Date: 2017/1/19 下午4:53
 * Email: www@chenruixuan.com
 */
namespace Chenruixuan\Kafka\Exception;
class ErrorCode
{
    public $code = array(
        '-200' => 'RD_KAFKA_RESP_ERR__BEGIN',
        '-199' => 'RD_KAFKA_RESP_ERR__BAD_MSG',
        '-198' => 'RD_KAFKA_RESP_ERR__BAD_COMPRESSION',
        '-197' => 'RD_KAFKA_RESP_ERR__DESTROY',
        '-196' => 'RD_KAFKA_RESP_ERR__FAIL',
        '-195' => 'RD_KAFKA_RESP_ERR__TRANSPORT',
        '-194' => 'RD_KAFKA_RESP_ERR__CRIT_SYS_RESOURCE',
        '-193' => 'RD_KAFKA_RESP_ERR__RESOLVE',
        '-192' => 'RD_KAFKA_RESP_ERR__MSG_TIMED_OUT',
        '-191' => 'RD_KAFKA_RESP_ERR__PARTITION_EOF',
        '-190' => 'RD_KAFKA_RESP_ERR__UNKNOWN_PARTITION',
        '-189' => 'RD_KAFKA_RESP_ERR__FS',
        '-188' => 'RD_KAFKA_RESP_ERR__UNKNOWN_TOPIC',
        '-187' => 'RD_KAFKA_RESP_ERR__ALL_BROKERS_DOWN',
        '-186' => 'RD_KAFKA_RESP_ERR__INVALID_ARG',
        '-185' => 'RD_KAFKA_RESP_ERR__TIMED_OUT',
        '-184' => 'RD_KAFKA_RESP_ERR__QUEUE_FULL',
        '-183' => 'RD_KAFKA_RESP_ERR__ISR_INSUFF',
        '-100' => 'RD_KAFKA_RESP_ERR__END',
        '-1' => 'RD_KAFKA_RESP_ERR_UNKNOWN',
        '0' => 'RD_KAFKA_RESP_ERR_NO_ERROR',
        '1' => 'RD_KAFKA_RESP_ERR_OFFSET_OUT_OF_RANGE',
        '2' => 'RD_KAFKA_RESP_ERR_INVALID_MSG',
        '3' => 'RD_KAFKA_RESP_ERR_UNKNOWN_TOPIC_OR_PART',
        '4' => 'RD_KAFKA_RESP_ERR_INVALID_MSG_SIZE',
        '5' => 'RD_KAFKA_RESP_ERR_LEADER_NOT_AVAILABLE',
        '6' => 'RD_KAFKA_RESP_ERR_NOT_LEADER_FOR_PARTITION',
        '7' => 'RD_KAFKA_RESP_ERR_REQUEST_TIMED_OUT',
        '8' => 'RD_KAFKA_RESP_ERR_BROKER_NOT_AVAILABLE',
        '9' => 'RD_KAFKA_RESP_ERR_REPLICA_NOT_AVAILABLE',
        '10' => 'RD_KAFKA_RESP_ERR_MSG_SIZE_TOO_LARGE',
        '11' => 'RD_KAFKA_RESP_ERR_STALE_CTRL_EPOCH',
        '12' => 'RD_KAFKA_RESP_ERR_OFFSET_METADATA_TOO_LARGE'

    );

    public function getError($errCode)
    {
        return $this->code[$errCode];
    }
}