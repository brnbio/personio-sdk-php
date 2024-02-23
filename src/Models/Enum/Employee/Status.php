<?php

declare(strict_types=1);

namespace Personio\Models\Enum\Employee;

/**
 * Enum Status
 *
 * @package Personio\Models\Enum\Employee
 */
enum Status: string
{
    case ONBOARDING = 'onboarding';
    case ACTIVE     = 'active';
    case INACTIVE   = 'inactive';
    case LEAVE      = 'leave';

    /**
     * @return string
     */
    public function toArray(): string
    {
        return $this->value;
    }
}
