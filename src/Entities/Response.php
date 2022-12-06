<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\DataTransferObject;

class Response extends DataTransferObject
{
    public int $statusCode;
    public ?array $items;
    public ?int $offset;
    public ?int $limit;
    public ?int $total;
}
