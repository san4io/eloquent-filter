<?php

namespace San4io\EloquentFilter\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use San4io\EloquentFilter\Filters\BetweenFilter;
use San4io\EloquentFilter\Filters\LikeFilter;
use San4io\EloquentFilter\Filters\WhereFilter;
use San4io\EloquentFilter\Traits\Filterable;

/**
 * Class Event
 * @package Tests\Models
 */
class Event extends Model
{
    use Filterable;

    protected $fillable = [
        'title',
        'created_at',
    ];

    protected $filterable = [
        'id' => WhereFilter::class,
        'title' => LikeFilter::class,
        'created_at' => BetweenFilter::class
    ];
}