<?php

namespace San4io\EloquentFilter\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    /**
     * @param string $key
     * @param mixed $value
     * @return Builder
     */
    public function filter(string $key, $value): Builder;
}