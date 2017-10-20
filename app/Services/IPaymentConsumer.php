<?php

namespace Kenswitch\Services;

use \SoapClient;

class IPaymentConsumer
{
    protected $client;

    public function __construct(SoapClient $client)
    {
        $this->client = $client;
    }

    public function makeCall()
    {
        return $this->client(config('ipayment.wsdl'));
    }

    public function makePaymentRequest(array $data, $method = 'paymentOperation')
    {
        $call = $this->makeCall();

        return $call->$method($data);
    }
}