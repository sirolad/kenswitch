<?php

namespace Tests\Unit;

use Mockery as m;
use Tests\TestCase;
use Illuminate\Http\Request;
use Kenswitch\Services\IPaymentConsumer;
use Kenswitch\Repositories\IPaymentRepository;


class IPaymentRepositoryTest extends TestCase
{
    /**
     * @var IPaymentConsumer
     */
    protected $service;

    /**
     * @var IPaymentRepository
     */
    protected $repo;

    public function setUp()
    {
        parent::setUp();
        $this->service = m::mock(IPaymentConsumer::class);
        $this->app->instance(IPaymentConsumer::class, $this->service);
        $this->repo = $this->app->make(IPaymentRepository::class);
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
     * Test Call to SOAP service
     */
    public function testCallToSOAP()
    {
        $request = $this->app->make(Request::class);
        $this->service->shouldReceive('callOperation')->with($request->all())
            ->andReturn($this->xmlString());

        $this->assertInternalType('array', $this->repo->createPayment($request, $this->service));
    }

    /**
     * Test String
     *
     * @return string
     */
    protected function xmlString()
    {
        return <<<XML
<?xml version='1.0'?>
<return>
    <amount>500</amount>
    <cvv>123</cvv>
    <expirydate>1207</expirydate>
    <forwardinginst>Gtbank</forwardinginst>
    <localdate>408</localdate>
    <systemtraceno>5967</systemtraceno>
    <trantype>0</trantype>
    <pan>5041580050001156</pan>
    <pin>9228</pin>
    <receivinginst>Access Bank</receivinginst>
    <referenceno>6845486025</referenceno>
    <secret>defaultpass</secret>
    <token>secret</token>
    <transmissiondateandtime>106960719</transmissiondateandtime>
</return>    
XML;
    }
}
