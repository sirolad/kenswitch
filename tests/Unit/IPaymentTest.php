<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A Payment routes.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/')->assertStatus(200);
    }
}
