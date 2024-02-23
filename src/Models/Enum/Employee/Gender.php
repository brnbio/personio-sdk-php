<?php

declare(strict_types=1);

namespace Personio\Models\Enum\Employee;

/**
 * Enum Gender
 *
 * @package Personio\Models\Enum\Employee
 */
enum Gender: string
{
    case MALE      = 'male';
    case FEMALE    = 'female';
    case DIVERSE   = 'diverse';
    case UNDEFINED = 'undefined';

    /**
     * @return string
     */
    public function toArray(): string
    {
        return $this->value;
    }
}
