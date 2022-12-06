<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\DataTransferObject;

class Status extends DataTransferObject
{
    public int $id;

    public string $name;
}
