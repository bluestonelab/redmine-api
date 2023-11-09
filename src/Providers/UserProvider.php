<?php

namespace Bluestone\Redmine\Providers;

use Bluestone\Redmine\Entities\User;
use Bluestone\Redmine\Entities\Tracker;
use Bluestone\Redmine\Entities\Response;
use Bluestone\Redmine\HttpHandler;

class UserProvider
{
    public function __construct(protected HttpHandler $http)
    {
    }

    public function all(array $params = []): Response
    {
        $response = $this->http->sendRequest('get', 'users.json', $params);

        $users = array_map(
            function (array $properties) use ($response) {
                return new User($properties);
            },
            $response['body']['users'],
        );

        return new Response(
            statusCode: $response['statusCode'],
            items: $users,
            offset: $response['body']['offset'] ?? null,
            limit: $response['body']['limit'] ?? null,
            total: $response['body']['total_count'] ?? count($users)
        );
    }

    public function get(int $id, array $params = []): Response
    {
        $response = $this->http->sendRequest('get', "users/{$id}.json", $params);

        $user = new User($response['body']['user']);

        return new Response(
            statusCode: $response['statusCode'],
            items: [$user],
        );
    }
}
