<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\DataTransferObject;

class User extends DataTransferObject
{
    public int $id;

    public string $name;
}
