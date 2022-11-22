<?php

namespace Bluestone\Redmine\Entities;

use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class TimeEntry extends DataTransferObject
{
    public int $id;

    public Project $project;

    public Issue $issue;

    #[MapFrom('user')]
    public User $author;

    public Activity $activity;

    public float $hours;

    public string $comments;

    #[MapFrom('spent_on')]
    #[CastWith(DateTimeCaster::class)]
    public DateTime $spentOn;

    #[MapFrom('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public DateTime $createdOn;

    #[MapFrom('updated_on')]
    #[CastWith(DateTimeCaster::class)]
    public DateTime $updatedOn;
}
