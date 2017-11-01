<?php

namespace Tests;

use Illuminate\Database\Schema\Blueprint;

class TestCase extends \Orchestra\Testbench\TestCase
{
    const DB_SQLITE = __DIR__.'/db/db.sqlite';

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $this->setUpDatabase();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => self::DB_SQLITE,
            'prefix' => '',
        ]);
        $app['config']->set('app.key', '6rE9Nz372GRbeMATftriyQjrpF7DcOQm');
    }

    /**
     *
     */
    protected function setUpDatabase()
    {
        $this->resetDatabase();
        $this->createTables();
    }

    /**
     *
     */
    protected function resetDatabase()
    {
        file_put_contents(self::DB_SQLITE, null);
    }

    /**
     *
     */
    protected function createTables()
    {
        $this->createEventsTable();
    }

    /**
     *
     */
    protected function createEventsTable()
    {
        $this->app['db']->connection()->getSchemaBuilder()->create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
    }
}