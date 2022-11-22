<?php

namespace Bluestone\Redmine\Providers;

use Bluestone\Redmine\Entities\Project;
use Bluestone\Redmine\Entities\Response;
use Bluestone\Redmine\HttpHandler;

class ProjectProvider
{
    public function __construct(protected HttpHandler $http)
    {
    }

    public function all(array $params = []): Response
    {
        $response = $this->http->sendRequest('get', 'projects.json', $params);

        $projects = array_map(
            function (array $properties) use ($response) {
                return new Project($properties);
            },
            $response['body']['projects'],
        );

        return new Response(
            statusCode: $response['statusCode'],
            items: $projects,
            offset: $response['body']['offset'] ?? null,
            limit: $response['body']['limit'] ?? null,
            total: $response['body']['total_count'] ?? count($projects)
        );
    }
}
