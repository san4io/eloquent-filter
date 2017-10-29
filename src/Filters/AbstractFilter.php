<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.10.29
 * Time: 19.59
 */

namespace San4io\EloquentFilter\Filters;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

abstract class AbstractFilter implements FilterInterface
{
    /**
     * @var Builder|Model
     */
    protected $model;

    /**
     * AbstractFilter constructor.
     * @param Model|Builder $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }
}