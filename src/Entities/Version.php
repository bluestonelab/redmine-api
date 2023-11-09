<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\Attributes\CastWith;
use Bluestone\DataTransferObject\Attributes\Map;
use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Bluestone\DataTransferObject\DataTransferObject;

class Version extends DataTransferObject
{
    public int $id;

    public string $name;

    public ?Project $project;

    public ?string $description;

    public ?string $status;

    #[Map('due_date')]
    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public ?DateTime $dueDate;

    public ?string $sharing;

    #[Map('wiki_page_title')]
    public ?string $wikiPageTitle;

    #[Map('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $createdOn;

    #[Map('updated_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $updatedOn;

    public function serialize(): array
    {
        return [
            'name' => $this->name,
            'status' => $this->status,
            'sharing' => $this->sharing,
            'due_date' => $this->dueDate?->format('Y-m-d'),
            'description' => $this->description,
            'wiki_page_title' => $this->wikiPageTitle,
        ];
    }
}
