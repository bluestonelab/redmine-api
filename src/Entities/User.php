<?php

namespace Bluestone\Redmine\Entities;

use Spatie\DataTransferObject\DataTransferObject;

class User extends DataTransferObject
{
    public int $id;

    public string $name;
}
