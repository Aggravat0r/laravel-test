<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeederTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_db_seeders()
    {
        // Run the DatabaseSeeder...
        $this->seed();
    }
}
