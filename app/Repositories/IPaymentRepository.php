<?php

namespace Kenswitch\Repositories;

use Kenswitch\IPayment;
use Illuminate\Http\Request;
use Illuminate\Container\Container as App;
use Kenswitch\Services\IPaymentConsumer as Service;

class IPaymentRepository extends BaseRepository
{
    /**
     * Model Class
     *
     * @return string
     */
    public function model()
    {
        return IPayment::class;
    }

    /**
     * Make Payment
     *
     * @param Request $request
     * @return array
     */
    public function createPayment(Request $request, Service $service)
    {
        $data = $request->all();
        $response = $service->callOperation($data);

        return $this->transformData($response);
    }

    /**
     * Transform returned data from webservice
     *
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