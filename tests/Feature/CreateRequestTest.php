<?php

namespace Tests\Feature;

use Kenswitch\Payment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateRequestTest extends TestCase
{
    use DatabaseMigrations;

    protected $payment;

    public function setUp()
    {
        parent::setUp();

        $this->payment = factory(Payment::class)->make();
    }

    public function testCreatePayment()
    {
        $this->post('/api/ipayment', $this->payment->toArray())
            ->assertStatus(302);
    }
}
