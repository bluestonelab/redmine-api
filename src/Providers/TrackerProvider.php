<?php

namespace Bluestone\Redmine\Providers;

use Bluestone\Redmine\Entities\Tracker;
use Bluestone\Redmine\Entities\Response;
use Bluestone\Redmine\HttpHandler;

class TrackerProvider
{
    public function __construct(protected HttpHandler $http)
    {
    }

    public function all(array $params = []): Response
    {
        $response = $this->http->sendRequest('get', 'trackers.json', $params);

        $trackers = array_map(
            function (array $properties) use ($response) {
                return new Tracker($properties);
            },
            $response['body']['trackers'],
        );

        return new Response(
            statusCode: $response['statusCode'],
            items: $trackers,
            offset: $response['body']['offset'] ?? null,
            limit: $response['body']['limit'] ?? null,
            total: $response['body']['total_count'] ?? count($trackers)
        );
    }
}
