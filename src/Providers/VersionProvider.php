<?php

namespace Bluestone\Redmine\Providers;

use Bluestone\Redmine\Entities\Project;
use Bluestone\Redmine\Entities\Response;
use Bluestone\Redmine\Entities\Version;
use Bluestone\Redmine\HttpHandler;

class VersionProvider
{
    public function __construct(protected HttpHandler $http)
    {
    }

    public function all(Project $project, array $params = []): Response
    {
        $response = $this->http->sendRequest('get', "projects/{$project->id}/versions.json", $params);

        $versions = array_map(
            function (array $properties) use ($response) {
                return new Version($properties);
            },
            $response['body']['versions'],
        );

        return new Response(
            statusCode: $response['statusCode'],
            items: $versions,
            offset: $response['body']['offset'] ?? null,
            limit: $response['body']['limit'] ?? null,
            total: $response['body']['total_count'] ?? count($versions)
        );
    }
}
