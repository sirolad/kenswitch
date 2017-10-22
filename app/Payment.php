<?php

namespace Kenswitch;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $amount;

    public $cvv;

    public $expiryDate;

    public $forwardingInst;

    public $localDate;

    public $localTime;

    public $merchantId;

    public $pan;

    public $pin;

    public $receivingInst;

    public $referenceNo;

    public $secret;

    public $systemTraceNo;

    public $token;

    public $tranType;

    public $transmissionDateAndTime;




}
