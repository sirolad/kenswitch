<?php

namespace Kenswitch\Repositories;

use Kenswitch\IPayment;
use Illuminate\Http\Request;
use Illuminate\Container\Container as App;
use Kenswitch\Services\IPaymentConsumer as Service;

class IPaymentRepository extends BaseRepository
{
    protected $service;

    public function __construct(App $app, Service $service)
    {
        parent::__construct($app);
        $this->service = $service;
    }

    public function model()
    {
        return IPayment::class;
    }

    public function createPayment(Request $request)
    {
        $data = $request->all();
        $response = $this->service->callOperation($data);

        return $this->transformData($response);
    }

    /**
     * @param $data
     * @return array
     */
    protected function transformData($data)
    {
        $xmlObject = simplexml_load_string($data);
        $jsonObject = json_encode($xmlObject);

        return json_decode($jsonObject, TRUE);
    }
}