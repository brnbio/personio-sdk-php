<?php

declare(strict_types=1);

namespace Personio\Models;

use Carbon\Carbon;
use Personio\Models\Enum\Employee as EmployeeEnum;

/**
 * Class Employee
 *
 * @package Personio\Models
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $preferred_name
 * @property string $email
 * @property EmployeeEnum\Gender $gender
 * @property EmployeeEnum\Status $status
 * @property string $position
 * @property string|null $supervisor
 * @property EmployeeEnum\EmploymentType $employment_type
 * @property int $weekly_working_hours
 * @property Carbon $hire_date
 * @property Carbon|null $contract_end_date
 * @property Carbon|null $termination_date
 * @property string $termination_type // todo: enum
 * @property string|null $termination_reason
 * @property Carbon|null $probation_period_end
 * @property Carbon $created_at
 * @property Carbon $last_modified_at
 * @property string|null $subcompany
 * @property string|null $office
 * @property string|null $department
 * @property string|null $team
 * @property array $cost_centers
 * @property array $holiday_calendar
 * @property array $absence_entitlement
 * @property array $work_schedule
 * @property float $fix_salary
 * @property string $fix_salary_interval
 * @property float $hourly_salary
 * @property float $vacation_day_balance
 * @property Carbon|null $last_working_day
 * @property string|null $profile_picture
 */
class Employee extends Model
{
    public const ATTRIBUTE_ID = 'id';
    public const ATTRIBUTE_FIRST_NAME = 'first_name';
    public const ATTRIBUTE_LAST_NAME = 'last_name';
    public const ATTRIBUTE_PREFERRED_NAME = 'preferred_name';
    public const ATTRIBUTE_EMAIL = 'email';
    public const ATTRIBUTE_GENDER = 'gender';
    public const ATTRIBUTE_STATUS = 'status';
    public const ATTRIBUTE_POSITION = 'position';
    public const ATTRIBUTE_SUPERVISOR = 'supervisor';
    public const ATTRIBUTE_EMPLOYMENT_TYPE = 'employment_type';
    public const ATTRIBUTE_WEEKLY_WORKING_HOURS = 'weekly_working_hours';
    public const ATTRIBUTE_HIRE_DATE = 'hire_date';
    public const ATTRIBUTE_CONTRACT_END_DATE = 'contract_end_date';
    public const ATTRIBUTE_TERMINATION_DATE = 'termination_date';
    public const ATTRIBUTE_TERMINATION_TYPE = 'termination_type';
    public const ATTRIBUTE_TERMINATION_REASON = 'termination_reason';
    public const ATTRIBUTE_PROBATION_PERIOD_END = 'probation_period_end';
    public const ATTRIBUTE_CREATED_AT = 'created_at';
    public const ATTRIBUTE_LAST_MODIFIED_AT = 'last_modified_at';
    public const ATTRIBUTE_SUBCOMPANY = 'subcompany';
    public const ATTRIBUTE_OFFICE = 'office';
    public const ATTRIBUTE_DEPARTMENT = 'department';
    public const ATTRIBUTE_TEAM = 'team';
    public const ATTRIBUTE_COST_CENTERS = 'cost_centers';
    public const ATTRIBUTE_HOLIDAY_CALENDAR = 'holiday_calendar';
    public const ATTRIBUTE_ABSENCE_ENTITLEMENT = 'absence_entitlement';
    public const ATTRIBUTE_WORK_SCHEDULE = 'work_schedule';
    public const ATTRIBUTE_FIX_SALARY = 'fix_salary';
    public const ATTRIBUTE_FIX_SALARY_INTERVAL = 'fix_salary_interval';
    public const ATTRIBUTE_HOURLY_SALARY = 'hourly_salary';
    public const ATTRIBUTE_VACATION_DAY_BALANCE = 'vacation_day_balance';
    public const ATTRIBUTE_LAST_WORKING_DAY = 'last_working_day';
    public const ATTRIBUTE_PROFILE_PICTURE = 'profile_picture';

    /**
     * @var array|string[]
     */
    protected array $casts = [
        self::ATTRIBUTE_GENDER           => EmployeeEnum\Gender::class,
        self::ATTRIBUTE_CREATED_AT       => 'datetime',
        self::ATTRIBUTE_LAST_MODIFIED_AT => 'datetime',
        self::ATTRIBUTE_EMPLOYMENT_TYPE  => EmployeeEnum\EmploymentType::class,
        self::ATTRIBUTE_STATUS           => EmployeeEnum\Status::class,
    ];
}