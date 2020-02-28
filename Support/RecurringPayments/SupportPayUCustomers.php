<?php

namespace Modules\Ipayu\Support\RecurringPayments;

use Modules\Ipayu\Support\SupportPayU;

use PayUParameters;
use PayUCustomers;

class SupportPayUCustomers extends SupportPayU
{

  public function creation ($data)
  {
    $parameters = array(
      // Enter the costumer name here.
      PayUParameters::CUSTOMER_NAME => $data['customer_name'],
      // Enter the costumer email here.
      PayUParameters::CUSTOMER_EMAIL => $data['customer_email']
    );

    $response = PayUCustomers::create($parameters);
    return $response;
  }

  public function update ($criteria, $data)
  {
    $parameters = array(
      // Enter the custumer ID here.
      PayUParameters::CUSTOMER_ID => $criteria,
      // Enter the custumer name here.
      PayUParameters::CUSTOMER_NAME => $data['customer_name'],
      // Enter the custumer email here.
      PayUParameters::CUSTOMER_EMAIL => $data['customer_email']
    );
    $response = PayUCustomers::update($parameters);
    return $response;
  }

  public function query ($criteria)
  {
    $parameters = array(
      // Enter the costumer name here.
      PayUParameters::CUSTOMER_ID => $criteria,
    );
    $response = PayUCustomers::find($parameters);
    return $response;
  }

  public function delete ($criteria)
  {
    $parameters = array(
      // Enter the costumer ID here.
      PayUParameters::CUSTOMER_ID => $criteria
    );
    $response = PayUCustomers::delete($parameters);
    return $response;
  }

}
