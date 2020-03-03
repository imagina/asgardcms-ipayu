<?php

namespace Modules\Ipayu\Support\RecurringPayments;

use Modules\Ipayu\Support\SupportPayU;

use PayUParameters;
use PayUCreditCards;

class SupportPayUCreditCards extends SupportPayU
{
  public function creation ($data)
  {
    $parameters = array(
      // Enter the costumer ID here.
      PayUParameters::CUSTOMER_ID => $data['customer_id'],
      // Enter the costumer name here.
      PayUParameters::PAYER_NAME => $data['payer_name'],
      //Enter the number of the credit card here
      PayUParameters::CREDIT_CARD_NUMBER => $data['credit_card_number'],
      // Enter the expiration date of the credit card here with format YYYY/MM
      PayUParameters::CREDIT_CARD_EXPIRATION_DATE => $data['credit_card_expiration_date'],
      // Enter the credit card’s franchise
      PayUParameters::PAYMENT_METHOD => $data['payment_method'],
      //Enter the payer's identification document related to the credit card here.
      PayUParameters::CREDIT_CARD_DOCUMENT => $data['credit_card_document'],
      // (OPTIONAL) Enter the payer's identification document here.
      PayUParameters::PAYER_DNI => $data['payer_dni'],
      // (OPTIONAL) Enter the first part of the address here
      PayUParameters::PAYER_STREET => $data['payer_street'],
      // (OPTIONAL) Enter the second part of the address here
      PayUParameters::PAYER_STREET_2 => $data['payer_street_2'],
      // (OPTIONAL) Enter the third part of the address here
      PayUParameters::PAYER_STREET_3 => $data['payer_street_3'],
      // (OPTIONAL) Enter the city of the payer here.
      PayUParameters::PAYER_CITY => $data['payer_city'],
      // (OPTIONAL) Enter the state of the payer here.
      PayUParameters::PAYER_STATE => $data['payer_state'],
      // (OPTIONAL) Enter the code of the country here.
      PayUParameters::PAYER_COUNTRY => $data['payer_country'],
      // (OPTIONAL) Enter the postal code of the payer here.
      PayUParameters::PAYER_POSTAL_CODE => $data['payer_postal_code'],
      // (OPTIONAL) Enter the contact phone here.
      PayUParameters::PAYER_PHONE => $data['payer_phone']
    );

    $response = PayUCreditCards::create($parameters);
    return $response;
  }

  public function update ($criteria, $data)
  {

    $parameters = array(
      // Enter the credit card’s token identifier here.
      PayUParameters::TOKEN_ID => $criteria,
      // Enter the costumer name here.
      PayUParameters::PAYER_NAME => $data['payer_name'],
      // Enter the expiration date of the credit card here with format YYYY/MM
      PayUParameters::CREDIT_CARD_EXPIRATION_DATE => $data['credit_card_expiration_date'],
      //Enter the payer's identification document related to the credit card here.
      PayUParameters::CREDIT_CARD_DOCUMENT => $data['credit_card_document'],
      // (OPTIONAL) Enter the payer's identification document here.
      PayUParameters::PAYER_DNI => $data['payer_dni'],
      // (OPTIONAL) Enter the first part of the address here
      PayUParameters::PAYER_STREET => $data['payer_street'],
      // (OPTIONAL) Enter the second part of the address here
      PayUParameters::PAYER_STREET_2 => $data['payer_street_2'],
      // (OPTIONAL) Enter the third part of the address here
      PayUParameters::PAYER_STREET_3 => $data['payer_street_3'],
      // (OPTIONAL) Enter the city of the payer here.
      PayUParameters::PAYER_CITY => $data['payer_city'],
      // (OPTIONAL) Enter the state of the payer here.
      PayUParameters::PAYER_STATE => $data['payer_state'],
      // (OPTIONAL) Enter the code of the country here.
      PayUParameters::PAYER_COUNTRY => $data['payer_country'],
      // (OPTIONAL) Enter the postal code of the payer here.
      PayUParameters::PAYER_POSTAL_CODE => $data['payer_postal_code'],
      // (OPTIONAL) Enter the contact phone here.
      PayUParameters::PAYER_PHONE => $data['payer_phone']
    );
    $response= PayUCreditCards::update($parameters);
    return $response;
  }

  public function query ($criteria)
  {
    $parameters = array(
      // Enter the credit card’s token identifier here.
      PayUParameters::TOKEN_ID => $criteria
    );
    $response = PayUCreditCards::find($parameters);
    return $response;
  }

  public function delete ($criteria, $customerId)
  {
    $parameters = array(
      // Enter the credit card’s token identifier here.
      PayUParameters::TOKEN_ID => $criteria,
      // Enter the costumer ID here.
      PayUParameters::CUSTOMER_ID => $customerId
    );
    $response = PayUCreditCards::delete($parameters);
    return $response;
  }
}
