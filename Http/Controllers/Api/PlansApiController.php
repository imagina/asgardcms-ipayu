<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Modules\Setting\Contracts\Setting;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Modules\Ipayu\Support\RecurringPayments\SupportPayUPlans;

class PlansApiController extends BaseApiController
{
  private $payUPlans;

  public function __construct(SupportPayUPlans $payUPlans)
  {
    $this->payUPlans = $payUPlans;
  }

  public function create (Request $request)
  {
    try {
      $data = $request->input('attributes');
      $plan = $this->payUPlans->creation($data);
      $response = ["data" => $plan];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

  public function update ($criteria, Request $request)
  {
    try {
      $data = $request->input('attributes');
      $plan = $this->payUPlans->update($criteria, $data);
      $response = ["data" => $plan];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

  public function show ($criteria)
  {
    try{
      $data = $this->payUPlans->query($criteria);
      $response = [
        'data' => $data
      ];
      $status = 200;
    }catch (PayUException $e){
      $status = 500;
      $response = ["errors" => $e];
    }
    return response()->json($response, $status);
  }

  public function delete ($criteria)
  {
    try {
      $plan = $this->payUPlans->delete($criteria);
      $response = ["data" => $plan];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

}
