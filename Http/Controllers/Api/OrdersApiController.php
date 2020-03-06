<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Modules\Ipayu\Repositories\OrderRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Modules\Ipayu\Transformers\OrderTransformer;

class OrdersApiController extends BaseApiController
{

  private $order;

  public function __construct(OrderRepository $order)
  {
    $this->order = $order;
  }

  public function index (Request $request)
  {
    try {
      /* Get Params */
      $params = $this->getParamsRequest($request);

      /* Get data from local Entity */
      $orders = $this->order->getItemsBy($params);

      /* Preparing Response */
      $response = [
        "data" => OrderTransformer::collection($orders)
      ];

      $params->page ? $response["meta"] = ["page" => $this->pageTransformer($orders)] : false;
    } catch (\Exception $e) {
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    /* Return response */
    return response()->json($response, $status ?? 200);
  }

  public function create (Request $request)
  {
    try {
      /* This request is sent from PayU */
      /* Save data in local Entity */
      $order = $this->order->create($request);

      /* Preparing Response */
      $response = [
        "data" => new OrderTransformer($order)
      ];

    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

  public function show ($criteria)
  {
    try{
      /* Get Params */
      $params = $this->getParamsRequest($request);

      /* Get data from repository */
      $order = $this->order->getItem($criteria, $params);

      /* Preparing Response */
      $response = [
        'data' => new OrderTransformer($order)
      ];
      $status = 200;
    }catch (Exception $e){
      $status = 500;
      $response = ["errors" => $e];
    }
    return response()->json($response, $status);
  }

}
