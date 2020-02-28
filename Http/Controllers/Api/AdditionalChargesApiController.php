<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Modules\Ipayu\Support\RecurringPayments\SupportPayUAdditionalCharges;

class AdditionalChargesApiController extends BaseApiController
{

  private $payUAdditionalCharges;

  public function __construct(SupportPayUAdditionalCharges $payUAdditionalCharges)
  {
    $this->payUAdditionalCharges = $payUAdditionalCharges;
  }

  public function create (Request $request)
  {
    try {
      $data = $request->input('attributes');
      $additionalCharge = $this->payUAdditionalCharges->creation($data);
      $response = ["data" => $additionalCharge];
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
      $additionalCharge = $this->payUAdditionalCharges->update($criteria, $data);
      $response = ["data" => $additionalCharge];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

  public function show ($criteria)
  {
    try{
      $additionalCharge = $this->payUAdditionalCharges->query($criteria);
      $response = [
        'data' => $additionalCharge
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
      $additionalCharge = $this->payUAdditionalCharges->delete($criteria);
      $response = ["data" => $additionalCharge];
    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

}
