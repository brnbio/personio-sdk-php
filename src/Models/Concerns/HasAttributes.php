<?php

declare(strict_types=1);

namespace Personio\Models\Concerns;

use BackedEnum;
use Carbon\Carbon;

/**
 * Trait HasAttributes
 *
 * @property array $attributes
 */
trait HasAttributes
{
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * @var array
     */
    protected array $casts = [];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $attribute => $item) {
            $this->attributes[$attribute] = $this->castAttribute($attribute, $item['value']);
        }
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function __get(string $key): mixed
    {
        return $this->attributes[$key];
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $attributes = $this->attributes;
        foreach ($attributes as $key => $value) {
            if ($value instanceof Carbon) {
                $attributes[$key] = $value->toDateTimeString();
            } elseif (is_object($value) && method_exists($value, 'toArray')) {
                $attributes[$key] = $value->toArray();
            } elseif (is_subclass_of($value, BackedEnum::class) && method_exists($value, 'toArray')) {
                $attributes[$key] = $value->toArray();
            }
        }

        return $attributes;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    protected function castAttribute(string $key, mixed $value): mixed
    {
        $castType = $this->casts[$key] ?? null;

        switch ($castType) {
            case 'int':
            case 'integer':
                return (int) $value;
            case 'real':
            case 'float':
            case 'double':
                return (float) $value;
            case 'bool':
            case 'boolean':
                return (bool) $value;
            case 'object':
                return json_decode($value, true);
            case 'array':
            case 'json':
                return json_decode($value);
            case 'date':
                return (new Carbon($value))->startOfDay();
            case 'datetime':
                return new Carbon($value);
        }

        if (is_subclass_of($castType, BackedEnum::class)) {
            return $castType::from($value);
        }

        return $value;
    }
}