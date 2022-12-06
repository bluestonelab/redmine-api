<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\Attributes\Map;
use Bluestone\DataTransferObject\DataTransferObject;

class Relation extends DataTransferObject
{
    public int $id;

    #[Map('issue_id')]
    public int $issueId;

    #[Map('issue_to_id')]
    public int $issueToId;

    #[Map('relation_type')]
    public string $relationType;

    public ?string $delay;
}
