<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Str;

class TitleClass implements CastsAttributes
{
    public function set($model, string $key, $value, array $attributes)
    {
        return Str::lower($value);
    }

    public function get($model, string $key, $value, array $attributes)
    {
        return Str::ucfirst($value);
    }
}
