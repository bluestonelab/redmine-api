<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\Attributes\CastWith;
use Bluestone\DataTransferObject\Attributes\Map;
use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Bluestone\DataTransferObject\DataTransferObject;
use Bluestone\DataTransferObject\Casters\ArrayCaster;

class Project extends DataTransferObject
{
    public int $id;

    public ?string $identifier;

    public ?string $name;

    public ?string $description;

    public ?string $homepage;

    public ?int $status;

    public ?Project $parent;

    #[Map('default_assignee')]
    public ?User $defaultAssignee;

    #[Map('default_version')]
    public ?Version $defaultVersion;

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
