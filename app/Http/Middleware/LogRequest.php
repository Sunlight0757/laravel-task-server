<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    $logger = new Logger('my_logger');
    // Now add some handlers
    $logger->pushHandler(new StdoutHandler());

    $config = \Kafka\ProducerConfig::getInstance();
    $config->setMetadataRefreshIntervalMs(10000);
    $config->setMetadataBrokerList('10.13.4.159:9192');
    $config->setBrokerVersion('1.0.0');
    $config->setRequiredAck(1);
    $config->setIsAsyn(false);
    $config->setProduceInterval(500);
    $producer = new \Kafka\Producer(
        function() {
            return [
                [
                    'topic' => 'test',
                    'value' => 'test....message.',
                    'key' => 'testkey',
                ],
            ];
        }
    );
    $producer->setLogger($logger);
    $producer->success(function($result) {
        var_dump($result);
    });
    $producer->error(function($errorCode) {
            var_dump($errorCode);
    });
    $producer->send(true);
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
