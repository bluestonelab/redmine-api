<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\DataTransferObject;

class CustomField extends DataTransferObject
{
    public int $id;

    public ?string $name;

    public mixed $value;

    public function serialize()
    {
        return [
            'id' => $this->id,
            'value' => $this->value
        ];
    }
}
