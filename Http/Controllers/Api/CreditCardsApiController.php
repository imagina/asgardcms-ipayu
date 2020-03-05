<?php

namespace Modules\Ipayu\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Modules\Ipayu\Support\RecurringPayments\SupportPayUCreditCards;

use Modules\Ipayu\Repositories\CreditCardRepository;

use Modules\Ipayu\Transformers\CreditCardTransformer;

use Illuminate\Support\Facades\Auth;

class CreditCardsApiController extends BaseApiController
{

  private $payUCreditCards;

  private $creditCardRepository;

  public function __construct(SupportPayUCreditCards $payUCreditCards, CreditCardRepository $creditCardRepository)
  {
    $this->payUCreditCards = $payUCreditCards;
    $this->creditCardRepository = $creditCardRepository;
  }

  /**
   * GET ITEMS
   *
   * @return mixed
   */
  public function index(Request $request)
  {
    try {
      /* Get Params */
      $params = $this->getParamsRequest($request);

      /* Get data from local Entity */
      $creditCards = $this->creditCardRepository->getItemsBy($params);

      /* Preparing Response */
      $response = [
        "data" => CreditCardTransformer::collection($creditCards)
      ];

      $params->page ? $response["meta"] = ["page" => $this->pageTransformer($categories)] : false;
    } catch (\Exception $e) {
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    //Return response
    return response()->json($response, $status ?? 200);
  }



  public function create (Request $request)
  {
    try {
      $data = $request->input('attributes');

      /* Save data in PayU */
      $creditCard = $this->payUCreditCards->creation($data);

      /* Preparing data for local repository */
      $dataForRepo = [
        'token' => $creditCard->token,
        'user_id' => Auth::id(),
        'creditcard_name' => $data['payer_name'],
        'creditcard_number' => substr($data['credit_card_number'], -4),
        'creditcard_type' => $data['payment_method'],
        'creditcard_expiration_date' => $data['credit_card_expiration_date'],
      ];

      /* Save data in local Entity */
      $creditCardFromRepo = $this->creditCardRepository->create($dataForRepo);

      /* Preparing Response */
      $response = [
        "data" => new CreditCardTransformer($creditCardFromRepo)
      ];

    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

  public function update ($criteria, Request $request)
  {
    try {
      /* Get params from route */
      $params = $this->getParamsRequest($request);

      /* Get data from attributes */
      $data = $request->input('attributes');

      /* Get credit card From local Entity */
      $creditCardRepo = $this->creditCardRepository->getItem($criteria, $params);

      /* If not exist, return Exception */
      if (!$creditCardRepo) throw new Exception('Item not found', 404);

      /* Update credit card in PayU */
      $creditCard = $this->payUCreditCards->update($creditCardRepo->token, $data);

      /* Preparing data for local repository */
      $dataForRepo = [
        'token' => $creditCardRepo->token,
        'user_id' => Auth::id(),
        'creditcard_name' => $data['payer_name'],
        'creditcard_number' => substr($data['credit_card_number'], -4),
        'creditcard_type' => $data['payment_method'],
        'creditcard_expiration_date' => $data['credit_card_expiration_date'],
      ];

      /* Update credit card in Local Entity */
      $creditCardRepo = $this->category->update($creditCardRepo, $dataForRepo);

      /* Preparing Response */
      $response = [
        "data" => new CreditCardTransformer($creditCardRepo)
      ];

    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => 'Error'];
    }
    return response()->json($response, $status ?? 200);
  }

  public function show ($criteria, Request $request)
  {
    try{
      /* Get Params */
      $params = $this->getParamsRequest($request);

      /* Get data from repository */
      $creditCard = $this->creditCardRepository->getItem($criteria, $params);

      /* Preparing Response */
      $response = [
        'data' => new CreditCardTransformer($creditCard)
      ];
      $status = 200;
    }catch (PayUException $e){
      $status = 500;
      $response = ["errors" => $e];
    }
    return response()->json($response, $status);
  }

  public function delete ($criteria, Request $request)
  {
    try {
      /* Get Params */
      $params = $this->getParamsRequest($request);

      /* Get data from repository */
      $creditCardTmp = $this->creditCardRepository->getItem($criteria, $params);

      /* Delete data local Entity */
      $creditCard = $this->creditCardRepository->delete($criteria);

      /* Delete data from Puay */
      $creditCard = $this->payUCreditCards->delete($creditCardTmp->token);

      /* Get data from repository */
      $response = [
        "data" => $creditCard
      ];

    } catch (\Exception $e) {

      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }

}
