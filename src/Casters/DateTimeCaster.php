<?php

namespace Bluestone\Redmine\Casters;

use Bluestone\DataTransferObject\Casters\Caster;
use DateTime;

class DateTimeCaster implements Caster
{
    public function __construct(
        public string $format = DateTime::ATOM
    ) {
    }

    public function set(mixed $value)
    {
        return DateTime::createFromFormat($this->format, $value);
    }

    public function get(mixed $value)
    {
        return $value?->format($this->format);
    }
}
