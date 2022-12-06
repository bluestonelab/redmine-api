<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\DataTransferObject;

class Priority extends DataTransferObject
{
    public int $id;

    public ?string $name;
}
