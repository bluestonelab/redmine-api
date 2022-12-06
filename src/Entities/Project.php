<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\Attributes\CastWith;
use Bluestone\DataTransferObject\Attributes\Map;
use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Bluestone\DataTransferObject\DataTransferObject;

class Project extends DataTransferObject
{
    public int $id;

    public ?string $name;

    public ?string $description;

    public ?int $status;

    #[Map('is_public')]
    public ?bool $isPublic;

    #[Map('inherit_members')]
    public ?bool $inheritMembers;

    #[Map('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $createdOn;

    #[Map('updated_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $updatedOn;
}
