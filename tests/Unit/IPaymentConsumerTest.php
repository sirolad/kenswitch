<?php

namespace Tests\Unit;

use Mockery as m;
use Tests\TestCase;
use Kenswitch\Services\IPaymentConsumer;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IPaymentConsumerTest extends TestCase
{
    use DatabaseMigrations;

    protected $client;

    protected $consumer;

    /**
     * Test Construct
     */
    public function setUp()
    {
        parent::setUp();
        $this->client = m::mock(\SoapClient::class);
        $this->app->instance(\SoapClient::class, $this->client);
        $this->consumer = $this->app->make(IPaymentConsumer::class);
    }

    /**
     * Test Destruct
     */
    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }

    public function testOperationCanBeCalled()
    {
        $this->client->shouldreceive('paymentOperation')
            ->with($this->requestData())
            ->andReturn($this->xmlString());

        $this->assertInternalType('string',
            $this->consumer->callOperation($this->requestData()));
    }

    protected function requestData()
    {
        return [
            'amount' => 500,
            'CVV' => 123,
            'expiryDate' => 1207,
            'forwardingInst' => 'Gtbank',
            'localDate' => 0630,
            'localTime' => 013517,
            'merchantId' => 000000000000000,
            'pan' => 5041580050001156,
            'pin' => 9228,
            'receivingInst' => 'Access bank',
            'referenceNo' => 063001351711,
            'secret' => 'defaultpass',
            'systemTraceNo' => 013517,
            'token' => 'secret',
            'tranType' => 00,
            'transmissionDateAndTime' => 0630013517
        ];
    }

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
