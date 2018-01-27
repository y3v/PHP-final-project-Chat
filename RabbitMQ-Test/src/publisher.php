<?php
//include(__DIR__ . '/config.php');

require dirname(__DIR__) . "/vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$host = 'termite.rmq.cloudamqp.com';
$port = 5672;
$user = 'zwfknscz';
$pass = 't4hIn5wESjjBtrgE-3NEdCml5HD_8sg4';
$vhost = 'zwfknscz';

$exchange = 'router';
$queue = 'msgs';

$connection = new AMQPStreamConnection($host, $port, $user, $pass, $vhost);
$channel = $connection->channel();
/*
 The following code is the same both in the consumer and the producer.
 In this way we are sure we always have a queue to consume from and an
 exchange where to publish messages.
 */
/*
 name: $queue
 passive: false
 durable: true // the queue will survive server restarts
 exclusive: false // the queue can be accessed in other channels
 auto_delete: false //the queue won't be deleted once the channel is closed.
 */
$channel->queue_declare($queue, false, true, false, false);
/*
 name: $exchange
 type: direct
 passive: false
 durable: true // the exchange will survive server restarts
 auto_delete: false //the exchange won't be deleted once the channel is closed.
 */
$channel->exchange_declare($exchange, 'direct', false, true, false);
$channel->queue_bind($queue, $exchange);

$messageBody = "blah blah blah";
$message = new AMQPMessage($messageBody, array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));

$channel->basic_publish($message, $exchange);

$channel->close();
$connection->close();