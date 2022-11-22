# About Redmine API client

[![Run tests](https://github.com/bluestonelab/redmine-api/actions/workflows/run_tests.yml/badge.svg)](https://github.com/bluestonelab/redmine-api/actions/workflows/run_tests.yml)
[![Latest Stable Version](https://poser.pugx.org/bluestone/redmine-api/v/stable)](https://packagist.org/packages/bluestone/redmine-api)

## Installation

This package requires `php:^8.1`.  
You can install it via composer:
```bash
composer require bluestone/redmine-api
```

## Usage

First of all, you need to construct our service with a Guzzle client like this :

```php
$httpHandler = new \Bluestone\Redmine\HttpHandler(
    baseUri: 'https://redmine.org'
);

$redmine = new \Bluestone\Redmine\Client($httpHandler);
```

Let's discuss all possibilities one by one.

## Get projects

You can grab projects from [Redmine API](https://www.redmine.org/projects/redmine/wiki/Rest_Projects) using this method :

```php
$response = $redmine->project()->all();

foreach ($response->items as $project) {
    echo $project->name;
}
``` 

## Get issues

You can grab issues from [Redmine API](https://www.redmine.org/projects/redmine/wiki/Rest_Issues) using this method :

```php
$response = $redmine->issue()->all();

foreach ($response->items as $issue) {
    echo $issue->subject;
}
``` 

## Get project's versions

You can grab project's versions from [Redmine API](https://www.redmine.org/projects/redmine/wiki/Rest_Versions) using this method :

```php
$project = new \Bluestone\Redmine\Entities\Project([
    'id' => 42,
])

$response = $redmine->version()->all($project);

foreach ($response->items as $version) {
    echo $version->name;
}
``` 

## Get time entries

You can grab time entries from [Redmine API](https://www.redmine.org/projects/redmine/wiki/Rest_TimeEntries) using this method :

```php


$response = $redmine->timeEntry()->all();

foreach ($response->items as $timeEntry) {
    echo $timeEntry->hours;
}
```

## Get specific issue

You can grab specific issue from [Redmine API](https://www.redmine.org/projects/redmine/wiki/Rest_Issues) using this method :

```php
$response = $redmine->issue()->get(1);

$issue = $response->items[0];

echo $issue->subject;
``` 

## Update an issue


You can update an issue from [Redmine API](https://www.redmine.org/projects/redmine/wiki/Rest_Issues#Updating-an-issue) using this method :

```php
$issue = new \Bluestone\Redmine\Entities\Issue([
    'id' => 1,
    'subject' => 'Hello from API',
    'project' => new Project(id: 1),
    'note' => 'Update an issue from API',
]);

$response = $redmine->issue()->update($issue);

if ($response->statusCode === 204) {
    echo "Well done !"
}
```

## Contributing

Redmine API client is an open source project under MIT License and is open for contributions.
