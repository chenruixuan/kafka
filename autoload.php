<?php
/**
 * User: chenruixuan
 * Date: 2017/1/12 下午3:06
 * Email: www@chenruixuan.com
 */
spl_autoload_register(function ($classname) {

    $baseDir = __DIR__ . '/src/';

    if (strpos($classname, "Chenruixuan\\Kafka\\") === 0) {
        $file = $baseDir . str_replace('\\', '/', substr($classname, strlen('Chenruixuan\\Kafka\\'))) . '.php';
        if (is_file($file)) {
            require_once $file;
        }
    }
});