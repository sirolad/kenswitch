<?php

namespace Kenswitch\Http\Controllers\Api;

use Kenswitch\IPayment;
use Illuminate\Http\Request;
use Kenswitch\Http\Controllers\Controller;
use Kenswitch\Http\Requests\PaymentRequest;
use Kenswitch\Repositories\IPaymentRepository;
use Kenswitch\Http\Resources\IPaymentResource;
use Kenswitch\Http\Resources\IPaymentCollection;

class IPaymentController extends Controller
{
    /**
     * @var IPaymentRepository
     */
    protected $repository;

    /**
     * IPaymentController constructor.
     * @param IPaymentRepository $repository
     */
    public function __construct(IPaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return IPaymentCollection
     */
    public function index()
    {
        return new IPaymentCollection($this->repository->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $this->repository->createPayment($request);

        return response()->json(['success' => true,
            'message' => 'Transaction was successful.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param IPayment $ipayment
     * @return IPaymentResource
     */
    public function show(IPayment $ipayment)
    {
        return new IPaymentResource($ipayment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Kenswitch\IPayment  $ipayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IPayment $ipayment)
    {
        $this->repository->update($request->all(), $ipayment);

        return response()->json(['success' => true,
            'message' => 'Transaction successfully updated.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Kenswitch\IPayment  $ipayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(IPayment $ipayment)
    {
        $this->repository->delete($ipayment);

        return response()->json(['success' => true,
            'message' => 'Transaction Successfully deleted.'], 200);
    }
}
