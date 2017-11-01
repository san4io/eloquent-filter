# EloquentFilter
[![Build Status](https://scrutinizer-ci.com/g/san4io/eloquent-filter/badges/build.png?b=master)](https://scrutinizer-ci.com/g/san4io/eloquent-filter/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/san4io/eloquent-filter/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/san4io/eloquent-filter/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/san4io/eloquent-filter/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/san4io/eloquent-filter/?branch=master)

Package to filter your Eloquent model simply and elegantly.

## Requirements

* "php": ">=7.1",
* "illuminate/support": "5.*",
* "illuminate/database": "5.*"

## Installation
```sh
composer require san4io/eloquent-filter
```

## Usage
**Model**

Add **Filterable** trait to your eloquent model.

Create **$filterable** property with mappings corresponding to 
how model attributes should be filtered.

```php
class Event extends Model
{
    use Filterable;
    
    protected $fillable = [
        'country_id',
        'title',
    ];
    
    protected $filterable = [
        'country_id' => WhereFilter::class,
        'title' => LikeFilter::class,
        'created_at' => BetweenFilter::class
    ];
}
```

**Controller**

Just pass Request params to filter as array.
```php
public function index(Request $request): JsonResponse
{
    $events = Event::filter($request->all())->paginate(); // or get(), first() or whatever
    
    return response()->json($events);
}
```

**Request examples**

`http://localhost/api/v1/events?country_id=101&title=Sport`

`http://localhost/api/v1/events?country_id[]=101&country_id[]=102&title=Sport`

`http://localhost/api/v1/events?created_at[from]=2017-07-11&created_at[till]=2017-08-11&title=Sport`

### Filters
The package was build with mind that it should be easily extensible, 
that's why if you need some custom filters,
you can extend AbstractFilter and add necessary mapping to the model.

By default where are 3 filter types:
* WhereFilter
* LikeFilter
* BetweenFilter

#### WhereFilter
Accepts integer or array of integers

#### LikeFilter
Accepts string

#### BetweenFilter
Accepts array with keys ['from'] and ['till']

## Road map
* Tests
* Filtering Relations

## Contribution
Any contributions welcome!