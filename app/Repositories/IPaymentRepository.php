<?php

namespace Kenswitch\Repositories;

use Kenswitch\IPayment;
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

}