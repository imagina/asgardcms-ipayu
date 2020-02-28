<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Modules\Setting\Contracts\Setting;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Modules\Ipayu\Support\Queries\SupportPayUQueries;
use PayUException;

class QueriesApiController extends BaseApiController
{
  private $supportPayUQueries;

  public function __construct(SupportPayUQueries $supportPayUQueries)
  {
    $this->supportPayUQueries = $supportPayUQueries;
  }

  public function ping ()
  {
    try{
      $data = $this->supportPayUQueries->doPing();
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


  public function getOrderByidentifier($criteria)
  {
    try{
      $data = $this->supportPayUQueries->getOrderByidentifier($criteria);
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


  public function  getOrderByReference($criteria)
  {
    try{
      $data = $this->supportPayUQueries->getOrderByReference($criteria);
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

  public function getResponseTransactions ($criteria)
  {
    try{
      $data = $this->supportPayUQueries->getResponseTransactions($criteria);
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

}
