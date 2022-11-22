<?php

namespace Bluestone\Redmine\Entities;

use Spatie\DataTransferObject\DataTransferObject;

class Tracker extends DataTransferObject
{
    public int $id;

    public string $name;
}
