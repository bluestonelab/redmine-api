<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\Redmine\Casters\DateTimeCaster;
use DateTime;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class Attachment extends DataTransferObject
{
    public int $id;

    public ?string $filename;

    public ?string $filesize;

    #[MapFrom('content_type')]
    public ?string $contentType;

    public ?string $description;

    #[MapFrom('content_url')]
    public ?string $url;

    #[MapFrom('thumbnail_url')]
    public ?string $thumbnailUrl;

    public ?User $author;

    #[MapFrom('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $createdOn;
}
