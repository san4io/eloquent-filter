<?php

namespace San4io\EloquentFilter\Filters;

use Illuminate\Database\Eloquent\Builder;

class WhereFilter extends AbstractFilter
{
    /**
     * @param string $key
     * @param array|int $value
     * @return Builder
     */
    public function filter($key, $value)
    {
        if (is_array($value)) {
            return $this->model->whereIn($key, $value);
        }

        return $this->model->where($key, $value);
    }
}