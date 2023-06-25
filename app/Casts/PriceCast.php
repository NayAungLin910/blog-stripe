<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PriceCast implements CastsAttributes
{
    /**
     * Save the price in cents
     *
     * @param [type] $model
     * @param string $key
     * @param [type] $value
     * @param array $attributes
     * @return int
     */
    public function set($model, string $key, $value, array $attributes): int
    {
        return $value * 100;
    }

    /**
     * Get the value in dollar
     *
     * @param [type] $model
     * @param string $key
     * @param [type] $value
     * @param array $attributes
     * @return int
     */
    public function get($model, string $key, $value, array $attributes): int
    {
        return $value / 100;
    }
}
