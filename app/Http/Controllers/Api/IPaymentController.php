<?php

namespace Kenswitch\Http\Controllers\Api;

use Kenswitch\IPayment;
use Kenswitch\Services\IPaymentConsumer;
use Illuminate\Http\Request;
use Kenswitch\Http\Controllers\Controller;

class IPaymentController extends Controller
{
    protected $consumer;

    public function __construct(IPaymentConsumer $consumer)
    {
        $this->consumer = $consumer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $wsdl = 'http://localhost:8088/mockIPayment_Binding?WSDL';

        $this->client = new \SoapClient($wsdl);
        $d = ['firstName' => 'kola'];
//        $s = $this->client->sayHello($d);

        $data = [
            'amount' => 500,
            'CVV' => 123,
            'expiryDate' => 1207,
            'forwardingInst' => 'Gtbank',
            'localDate' => 0630,
            'localTime' => 013517,
            'merchantid' => 000000000000000,
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
        $response = $this->client->paymentOperation($data);
//        $arr = ['firstName' => 'Nigeria'];
//        $response = $this->client->sayHello();

        print_r($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->consumer->makePaymentRequest($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Kenswitch\IPayment  $iPayment
     * @return \Illuminate\Http\Response
     */
    public function show(IPayment $iPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Kenswitch\IPayment  $iPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(IPayment $iPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Kenswitch\IPayment  $iPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IPayment $iPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Kenswitch\IPayment  $iPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(IPayment $iPayment)
    {
        //
    }
}
