<?php

namespace Bluestone\Redmine\Providers;

use Bluestone\Redmine\Entities\Response;
use Bluestone\Redmine\Entities\TimeEntry;
use Bluestone\Redmine\HttpHandler;

class TimeEntryProvider
{
    public function __construct(protected HttpHandler $http)
    {
    }

    public function all(array $params = []): Response
    {
        $response = $this->http->sendRequest('get', 'time_entries.json', $params);

        $timeEntries = array_map(
            function (array $properties) use ($response) {
                return new TimeEntry($properties);
            },
            $response['body']['time_entries'],
        );

        return new Response(
            statusCode: $response['statusCode'],
            items: $timeEntries,
            offset: $response['body']['offset'] ?? null,
            limit: $response['body']['limit'] ?? null,
            total: $response['body']['total_count'] ?? count($timeEntries)
        );
    }

    public function get(int $id, array $params = []): Response
    {
        $response = $this->http->sendRequest('get', "time_entries/{$id}.json", $params);

        $timeEntry = new TimeEntry($response['body']['time_entry']);

        return new Response(
            statusCode: $response['statusCode'],
            items: [$timeEntry],
        );
    }

    public function create(TimeEntry $timeEntry): Response
    {
        $response = $this->http->sendRequest('post', "time_entries.json", ['time_entry' => $timeEntry->serialize()]);

        $timeEntry = new TimeEntry($response['body']['time_entry']);

        return new Response(
            statusCode: $response['statusCode'],
            items: [$timeEntry],
        );
    }

    public function update(TimeEntry $timeEntry): Response
    {
        $response = $this->http->sendRequest(
            'put',
            "time_entries/{$timeEntry->id}.json",
            ['time_entry' => $timeEntry->serialize()]
        );

        return new Response(
            statusCode: $response['statusCode'],
        );
    }

    public function delete(TimeEntry $timeEntry): Response
    {
        $response = $this->http->sendRequest('delete', "time_entries/{$timeEntry->id}.json");

        return new Response(
            statusCode: $response['statusCode'],
        );
    }
}
