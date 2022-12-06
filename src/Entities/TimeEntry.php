<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\Attributes\CastWith;
use Bluestone\DataTransferObject\Attributes\Map;
use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Bluestone\DataTransferObject\DataTransferObject;

class TimeEntry extends DataTransferObject
{
    public int $id;

    public Project $project;

    public Issue $issue;

    #[Map('user')]
    public User $author;

    public Activity $activity;

    public float $hours;

    public string $comments;

    #[Map('spent_on')]
    #[CastWith(DateTimeCaster::class, format: 'Y-m-d')]
    public DateTime $spentOn;

    #[Map('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public DateTime $createdOn;

    #[Map('updated_on')]
    #[CastWith(DateTimeCaster::class)]
    public DateTime $updatedOn;
}
