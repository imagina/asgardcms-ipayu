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

  public function create (Request $request)
  {
    try {
      $data = $request->input('attributes');
      $plan = $this->payUSubscription->creation($data);
      $response = ["data" => $plan];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

  public function delete ($criteria)
  {
    try {
      $plan = $this->payUSubscription->delete($criteria);
      $response = ["data" => $plan];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

}
