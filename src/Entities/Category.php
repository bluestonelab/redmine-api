<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\DataTransferObject;

class Category extends DataTransferObject
{
    public int $id;

    public ?string $name;
}
