<?php

namespace San4io\EloquentFilter\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    /**
     * @var Builder
     */
    protected $model;

    /**
     * AbstractFilter constructor.
     * @param Builder $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }
}
