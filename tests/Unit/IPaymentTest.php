<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IPaymentTest extends TestCase
{
   use DatabaseMigrations;

    /**
     * A Payment routes.
     *
     * @return void
     */
    public function testAllTransactionsRoute()
    {
        $this->get('/api/ipayment')->assertStatus(200);
    }

    public function testCanGetOneTransaction()
    {
        $this->get('/api/ipayment/6')->assertStatus(200);
    }
}
