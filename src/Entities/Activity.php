<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\DataTransferObject;

class Activity extends DataTransferObject
{
    public int $id;

    public string $name;
}
