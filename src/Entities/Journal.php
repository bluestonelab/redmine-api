<?php

namespace Bluestone\Redmine\Entities;

use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class Journal extends DataTransferObject
{
    public int $id;

    #[MapFrom('user')]
    public User $author;

    public ?string $notes;

    #[MapFrom('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public DateTime $createdOn;

    #[MapFrom('private_notes')]
    public bool $privateNotes;

    public array $details;
}
