<?php

namespace San4io\Tests\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use San4io\EloquentFilter\Filters\WhereFilter;
use San4io\Tests\TestCase;
use Tests\Models\Event;

class FilterableTraitTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->initEvents();
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            // Case 0: Where Filter
            [
                3,
                []
            ],
            // Case 1: Where Filter
            [
                1,
                ['id' => 1]
            ],

            // Case 2: Where Filter with array
            [
                2,
                ['id' => [1, 2]]
            ],

            // Case 3: Like Filter
            [
                2,
                ['title' => 'Event']
            ],
            // Case 4: Between Filter
            [
                2,
                [
                    'created_at' => [
                        'from' => Carbon::create(2014),
                        'till' => Carbon::create(2016)
                    ]
                ]
            ],
        ];
    }

    /**
     * @param int $expected
     * @param mixed $filter
     *
     * @dataProvider dataProvider
     */
    public function testFilter($expected, $filter)
    {
        /** @var Collection $events */
        $events = Event::filter($filter)->get();
        $this->assertEquals($expected, $events->count());
    }

    /**
     *
     */
    public function testFilterSetterWithResults()
    {
        $event = new Event();
        $event->setFilterable(['title' => WhereFilter::class]);

        /** @var Collection $events */
        $events = $event->filter(['title' => 'Health Check'])->get();
        $this->assertEquals(1, $events->count());
    }

    /**
     *
     */
    public function testFilterSetterWithoutResults()
    {
        $event = new Event();
        $event->setFilterable(['title' => WhereFilter::class]);

        /** @var Collection $events */
        $events = $event->filter(['title' => 'Health Che'])->get();
        $this->assertEquals(0, $events->count());
    }

    /**
     *
     */
    protected function initEvents()
    {
        Event::create([
            'title' => 'Party Event',
            'created_at' => Carbon::create(2017, 1, 1, 0, 0, 0),
        ]);
        Event::create([
            'title' => 'Sport Event',
            'created_at' => Carbon::create(2015, 1, 1, 0, 0, 0),
        ]);
        Event::create([
            'title' => 'Health Check',
            'created_at' => Carbon::create(2015, 1, 1, 0, 0, 0),
        ]);
    }
}