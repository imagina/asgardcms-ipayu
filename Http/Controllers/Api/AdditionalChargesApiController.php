<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Modules\Ipayu\Support\RecurringPayments\SupportPayUAdditionalCharges;

class AdditionalChargesApiController
{

  private $payUAdditionalCharges;

  public function __construct(SupportPayUAdditionalCharges $payUAdditionalCharges)
  {
    $this->payUAdditionalCharges = $payUAdditionalCharges;
  }

}
