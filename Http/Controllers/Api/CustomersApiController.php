<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Modules\Setting\Contracts\Setting;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Modules\Ipayu\Support\RecurringPayments\SupportPayUCustomers;

class CustomersApiController extends BaseApiController
{
  private $payUCustomers;

  public function __construct(SupportPayUCustomers $payUCustomers)
  {
    $this->payUCustomers = $payUCustomers;
  }

  public function create (Request $request)
  {
    try {
      $data = $request->input('attributes');
      $plan = $this->payUCustomers->creation($data);
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
      $plan = $this->payUCustomers->update($criteria, $data);
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
      $data = $this->payUCustomers->query($criteria);
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
      $plan = $this->payUCustomers->delete($criteria);
      $response = ["data" => $plan];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

}
