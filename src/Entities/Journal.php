<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\Attributes\CastWith;
use Bluestone\DataTransferObject\Attributes\Map;
use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Bluestone\DataTransferObject\DataTransferObject;

class Journal extends DataTransferObject
{
    public int $id;

    #[Map('user')]
    public User $author;

    public ?string $notes;

    #[Map('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public DateTime $createdOn;

    #[Map('private_notes')]
    public bool $privateNotes;

    public array $details;
}
