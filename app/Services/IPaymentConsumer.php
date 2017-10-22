<?php

namespace Kenswitch\Services;

use \SoapClient;

class IPaymentConsumer
{
    /**
     * @var SoapClient
     */
    protected $client;

    /**
     * IPaymentConsumer constructor.
     * @param SoapClient $client
     */
    public function __construct(SoapClient $client)
    {
        $this->client = $client;
    }

    /**
     * Make a call the operation
     *
     * @param array $data
     * @param string $method
     * @return string
     */
    public function callOperation(array $data, $method = 'paymentOperation')
    {
        return $this->client->$method($data);
    }
}