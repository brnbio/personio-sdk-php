<?php

declare(strict_types=1);

namespace Personio\Models\Enum\Employee;

/**
 * Enum EmploymentType
 *
 * @package Personio\Models\Enum\Employee
 */
enum EmploymentType: string
{
    case INTERNAL = 'internal';
    case EXTERNAL = 'external';

    /**
     * @return string
     */
    public function toArray(): string
    {
        return $this->value;
    }
}
