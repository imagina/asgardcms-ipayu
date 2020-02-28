<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Modules\Ipayu\Support\RecurringPayments\SupportPayUCreditCards;

class CreditCardsApiController
{

  private $payUCreditCards;

  public function __construct(SupportPayUCreditCards $payUCreditCards)
  {
    $this->payUCreditCards = $payUCreditCards;
  }

}
