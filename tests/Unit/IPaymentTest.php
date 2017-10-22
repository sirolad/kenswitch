<?php

namespace Tests\Unit;

use Tests\TestCase;
use Kenswitch\IPayment;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IPaymentTest extends TestCase
{
    use DatabaseMigrations;

    protected $transaction;

    public function setUp()
    {
        parent::setUp();

        $this->transaction = factory(IPayment::class);
    }

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
        $this->transaction->create(['id' => 3]);

        $this->get('/api/ipayment/3')->assertStatus(200);
    }

    public function testATransactionCanBeUpdated()
    {
        $this->transaction->create(['id' => 4]);

        $this->patch('/api/ipayment/4', ['amount' => 200])
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Transaction successfully updated.'
            ]);
    }

    public function testTransactionCanBeDeleted()
    {
        $this->transaction->create(['id' => 5]);

        $this->delete('/api/ipayment/5', ['amount' => 200])->assertStatus(200);
    }
}
