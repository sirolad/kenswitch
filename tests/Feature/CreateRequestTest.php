<?php

namespace Tests\Feature;

use Kenswitch\Repositories\IPaymentRepository;
use Mockery as m;
use Tests\TestCase;
use Kenswitch\Payment;
use Kenswitch\Http\Requests\PaymentRequest;
use Kenswitch\Http\Controllers\Api\IPaymentController;

class CreateRequestTest extends TestCase
{
    /**
     * @var string
     */
    protected $payment;

    /**
     * @var IPaymentRepository
     */
    protected $repo;

    /**
     * @var IPaymentController
     */
    protected $controller;

    /**
     * Test Construct
     */
    public function setUp()
    {
        parent::setUp();
        $this->payment = factory(Payment::class)->make();
        $this->repo = m::mock('Kenswitch\Repositories\IPaymentRepository');
        $this->app->instance('Kenswitch\Repositories\IPaymentRepository', $this->repo);
        $this->controller = $this->app->make(IPaymentController::class);
    }

    /**
     * Test Destruct
     */
    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }

    /**
     * Test the Create Payment route
     */
    public function testCreatePaymentRoute()
    {
        $this->post('/api/ipayment', $this->payment->toArray())
            ->assertStatus(302);
    }

    /**
     * Test that Payment can be made
     */
    public function testCreatePaymentAction()
    {
        $response = json_encode(['success' => true,
            'message' => 'Transaction was successful.']);
        $request = m::mock(PaymentRequest::class);
        $this->repo->shouldReceive('createPayment')->with($request)
            ->andReturn($response);

        $this->assertJson($response, $this->controller->store($request));
    }
}
