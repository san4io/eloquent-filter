<?php

namespace San4io\EloquentFilter\Filters;

use Illuminate\Database\Query\Builder;

class BetweenFilter extends AbstractFilter
{
    /**
     * @param string $key
     * @param array $value
     * @return Builder
     */
    public function filter($key, $value)
    {
        return $this->model->whereBetween($key, [$value['from'], $value['till']]);
    }
}