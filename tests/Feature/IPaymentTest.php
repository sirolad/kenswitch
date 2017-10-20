<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IPaymentTest extends TestCase
{
    /**
     * A Payment routes.
     *
     * @return void
     */
    public function testAllTransactionsRoute()
    {
        $this->get('/api/ipayment')->assertStatus(200);
    }
}
