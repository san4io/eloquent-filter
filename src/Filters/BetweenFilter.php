<?php

namespace San4io\EloquentFilter\Filters;

use Illuminate\Database\Eloquent\Builder;

class BetweenFilter extends AbstractFilter
{
    /**
     * @param string $key
     * @param array $value
     * @return Builder
     */
    public function filter(string $key, $value): Builder
    {
        return $this->model->whereBetween($key, [
            $value['from'],
            $value['till']
        ]);
    }
}