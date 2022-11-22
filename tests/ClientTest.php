<?php

namespace Tests;

use Bluestone\Redmine\Client;
use Bluestone\Redmine\HttpHandler;
use Bluestone\Redmine\Providers\IssueProvider;
use Bluestone\Redmine\Providers\ProjectProvider;
use Bluestone\Redmine\Providers\TimeEntryProvider;
use Bluestone\Redmine\Providers\VersionProvider;

class ClientTest extends TestCase
{
    /** @test */
    public function can_call_providers()
    {
        $http = $this->createHttpMock();

        $client = new Client($http);

        $this->assertInstanceOf(IssueProvider::class, $client->issue());
        $this->assertInstanceOf(ProjectProvider::class, $client->project());
        $this->assertInstanceOf(VersionProvider::class, $client->version());
        $this->assertInstanceOf(TimeEntryProvider::class, $client->timeEntry());
    }

    /** @test */
    public function can_have_http_handler()
    {
        $http = $this->createHttpMock();

        $client = new Client($http);

        $this->assertInstanceOf(HttpHandler::class, $client->getHttpHandler());
    }
}
