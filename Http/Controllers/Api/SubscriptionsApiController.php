<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Modules\Ipayu\Support\RecurringPayments\SupportPayUSubscription;

class SubscriptionsApiController
{

  private $payUSubscription;

  public function __construct(SupportPayUSubscription $payUSubscription)
  {
    $this->payUSubscription = $payUSubscription;
  }

}
