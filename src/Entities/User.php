<?php

namespace Bluestone\Redmine\Entities;

use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Bluestone\DataTransferObject\Attributes\Map;
use Bluestone\DataTransferObject\DataTransferObject;
use Bluestone\DataTransferObject\Attributes\CastWith;

class User extends DataTransferObject
{
    public int $id;

    public string $name;

    public ?string $login;

    #[Map('first_name')]
    public ?string $firstName;

    #[Map('last_name')]
    public ?string $lastName;

    #[Map('mail')]
    public ?string $mail;

    public ?int $status;

    #[Map('avatar_url')]
    public ?string $avatarUrl;

    #[Map('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $createdOn;

    #[Map('updated_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $updatedOn;

    #[Map('last_login_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $lastLoginOn;
}
