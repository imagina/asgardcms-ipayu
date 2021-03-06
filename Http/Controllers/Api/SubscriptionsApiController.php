<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Modules\Ipayu\Support\RecurringPayments\SupportPayUSubscription;

class SubscriptionsApiController extends BaseApiController
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
      $subscription = $this->payUSubscription->creation($data);
      $response = ["data" => $subscription];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

  public function delete ($criteria)
  {
    try {
      $subscription = $this->payUSubscription->delete($criteria);
      $response = ["data" => $subscription];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

}
