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

    public function get(int $id, array $params = []): Response
    {
        $response = $this->http->sendRequest('get', "versions/{$id}.json", $params);

        $version = new Version($response['body']['version']);

        return new Response(
            statusCode: $response['statusCode'],
            items: [$version],
        );
    }

    public function create(Project $project, Version $version): Response
    {
        $response = $this->http->sendRequest(
            'post',
            "projects/{$project->id}/versions.json",
            ['version' => $version->serialize()]
        );

        $version = new Version($response['body']['version']);

        return new Response(
            statusCode: $response['statusCode'],
            items: [$version],
        );
    }

    public function update(Version $version): Response
    {
        $response = $this->http->sendRequest(
            'put',
            "versions/{$version->id}.json",
            ['version' => $version->serialize()]
        );

        return new Response(
            statusCode: $response['statusCode'],
        );
    }

    public function delete(Version $version): Response
    {
        $response = $this->http->sendRequest('delete', "versions/{$version->id}.json");

        return new Response(
            statusCode: $response['statusCode'],
        );
    }
}
