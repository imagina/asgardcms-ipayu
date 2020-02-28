<?php

namespace Modules\Ipayu\Support\Queries;

use Modules\Ipayu\Support\SupportPayU;

use PayUReports;
use PayUException;
use PayUParameters;

class SupportPayUQueries extends SupportPayU
{

  public function doPing ()
  {
    $data = PayUReports::doPing();
    return $data;
  }

  public function getOrderByidentifier($criteria)
  {
    $parameters = array(PayUParameters::ORDER_ID => $criteria);
    $data = PayUReports::getOrderDetail($parameters);
    return $data;
  }

  public function  getOrderByReference($criteria)
  {
    $parameters = array(PayUParameters::ORDER_ID => $criteria);
    $data = PayUReports::getOrderDetailByReferenceCode($parameters);
    return $data;
  }

  public function getResponseTransactions ($criteria)
  {
    $parameters = array(PayUParameters::TRANSACTION_ID => $criteria);
    $data = PayUReports::getTransactionResponse($parameters);
    return $data;
  }

}
