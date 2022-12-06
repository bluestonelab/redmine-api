<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\Attributes\CastWith;
use Bluestone\DataTransferObject\Attributes\Map;
use Bluestone\DataTransferObject\DataTransferObject;
use Bluestone\Redmine\Casters\DateTimeCaster;
use DateTime;

class Attachment extends DataTransferObject
{
    public int $id;

    public ?string $filename;

    public ?string $filesize;

    #[Map('content_type')]
    public ?string $contentType;

    public ?string $description;

    #[Map('content_url')]
    public ?string $url;

    #[Map('thumbnail_url')]
    public ?string $thumbnailUrl;

    public ?User $author;

    #[Map('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $createdOn;
}
