<?php

$redis = new Redis();
$redis->connect("redis",6379);
$redis->set('test','this is a test for redis');
echo $redis->get('test');