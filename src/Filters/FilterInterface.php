<?php

namespace San4io\EloquentFilter\Filters;

use Illuminate\Database\Query\Builder;

interface FilterInterface
{
    /**
     * @param string $key
     * @param mixed $value
     * @return Builder
     */
    public function filter($key, $value);
}