<?php

namespace San4io\EloquentFilter\Filters;

use Illuminate\Database\Query\Builder;

class LikeFilter extends AbstractFilter
{

    /**
     * @param string $key
     * @param string $value
     * @return Builder
     */
    public function filter($key, $value)
    {
        return $this->model->where($key, 'like', "%$value%");
    }
}