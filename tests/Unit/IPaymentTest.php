<?php

namespace Tests\Unit;

use Tests\TestCase;
use Kenswitch\IPayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IPaymentTest extends TestCase
{
   use RefreshDatabase;

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
        factory(IPayment::class)->create(['id' => 3]);

        $this->get('/api/ipayment/3')->assertStatus(200);
    }

    public function testATransactionCanBeUpdated()
    {
        factory(IPayment::class)->create(['id' => 4]);

        $this->patch('/api/ipayment/4', ['amount' => 200])->assertStatus(200);
    }
}
