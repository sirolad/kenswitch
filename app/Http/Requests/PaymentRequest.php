<?php

namespace Kenswitch\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|integer',
            'CVV' => 'integer',
            'expiryDate' => 'required|integer',
            'forwardingInst' => 'string',
            'localDate' => 'integer',
            'localTime' => 'integer',
            'merchantid' => 'integer',
            'pan' => 'integer',
            'pin' => 'required|integer',
            'receivingInst' => 'string',
            'referenceNo' => 'required|integer',
            'secret' => 'required|string',
            'systemTraceNo' => 'required|integer',
            'token' => 'required|string',
            'tranType' => 'required|digits:2',
            'transmissionDateAndTime' => 'digits:10'
        ];
    }
}
