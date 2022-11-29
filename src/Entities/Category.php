<?php

namespace Bluestone\Redmine\Entities;

use Spatie\DataTransferObject\DataTransferObject;

class Category extends DataTransferObject
{
    public int $id;

    public ?string $name;
}
