<?php

namespace Kenswitch\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class IPaymentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'success' => true,
            'data' => [
                "id" => $this->id,
                "acquiringInstIdCode" => $this->acquiringInstIdCode,
                "additionalAmount" => $this->additionalAmount,
                "additionalData" => $this->additionalData,
                "amount"=> $this->amount,
                "authorizationResponseId"=> $this->authorizationResponseId,
                "currencyCode"=> $this->currencyCode,
                "localDate"=> $this->localDate,
                "localTime"=> $this->localTime,
                "nameAndLocation"=> $this->nameAndLocation,
                "referenceNo"=> $this->referenceNo,
                "responseCode"=> $this->responseCode,
                "systemAuditNumber" => $this->systemAuditNumber,
                "terminalId" => $this->terminalId,
                "tranType" => $this->tranType,
                "transmissionDateAndTime" => $this->transmissionDateAndTime,
                "created_at"=> $this->created_at,
                "updated_at"=> $this->updated_at,
            ],
            'links' => [
                'self' => route('ipayment.show', ['ipayment' => $this->id]),
            ],
        ];
    }
}
