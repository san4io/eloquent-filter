<?php

namespace San4io\EloquentFilter\Filters;

use Illuminate\Database\Eloquent\Builder;

class LikeFilter extends AbstractFilter
{
    /**
     * @param string $key
     * @param string $value
     * @return Builder
     */
    public function filter(string $key, $value): Builder
    {
        return $this->model->where($key, 'like', "%$value%");
    }
}