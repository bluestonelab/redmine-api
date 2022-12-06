<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\DataTransferObject;

class Tracker extends DataTransferObject
{
    public int $id;

    public string $name;
}
