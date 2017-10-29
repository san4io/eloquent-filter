<?php

namespace San4io\EloquentFilter\Traits;

use Illuminate\Database\Eloquent\Builder;
use San4io\EloquentFilter\Filters\AbstractFilter;

trait Filterable
{
    /**
     * @param Builder $query
     * @param array $data
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $data = [])
    {
        $filters = $this->getFilterable();

        foreach ($data as $key => $value) {
            if (in_array($key, array_keys($filters))) {
                /** @var AbstractFilter $filter */
                $filter = new $filters[$key]($query);
                $query = $filter->filter($key, $value);
            }
        }

        return $query;
    }

    /**
     * @return array
     */
    public function getFilterable(): array
    {
        return isset($this->filterable) ? $this->filterable : [];
    }

    /**
     * @param array $filterable
     */
    public function setFilterable(array $filterable)
    {
        $this->filterable = $filterable;
    }
}