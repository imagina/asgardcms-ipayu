<?php

namespace Modules\Ipayu\Support\RecurringPayments;

use Modules\Ipayu\Support\SupportPayU;

use PayUParameters;
use PayUSubscriptions;

class SupportPayUSubscription extends SupportPayU
{
  public function creation ($data)
  {
    $parameters = $this->getTypeCreate($data);
    $response = PayUSubscriptions::createSubscription($parameters);
    return $response;
  }

  public function delete ($criteria)
  {
    $parameters = array(
      // Enter the subscription ID here.
      PayUParameters::SUBSCRIPTION_ID => $criteria,
    );
    $response = PayUSubscriptions::cancel($parameters);
    return $response;
  }

  private function getTypeCreate ($data) {

    if ($data['all_new']){
      return array(
        //Enter the number of installments here.
        PayUParameters::INSTALLMENTS_NUMBER =>$data['installments_number'],
        // Enter the amount of trial days here.
        PayUParameters::TRIAL_DAYS => $data['trial_days'],

        // -- Client parameters --
        // Enter the costumer name here.
        PayUParameters::CUSTOMER_NAME => $data['customer_name'],
        // Enter the costumer email here.
        PayUParameters::CUSTOMER_EMAIL => $data['customer_email'],

        //-- Credit card parameters --
        // Enter the payer's name here.
        PayUParameters::PAYER_NAME => $data['payer_name'],
        // Enter the number of the credit card here
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
        PayUParameters::PAYER_PHONE => $data['payer_phone'],

        // -- Plan parameters --
        // Enter the plan‘s description here.
        PayUParameters::PLAN_DESCRIPTION => $data['plan_description'],
        // Enter the identification code of the plan here.
        PayUParameters::PLAN_CODE => $data['plan_code'],
        // Enter the interval of the plan here.
        PayUParameters::PLAN_INTERVAL => $data['plan_interval'],
        // Enter the number of intervals here.
        PayUParameters::PLAN_INTERVAL_COUNT => $data['plan_interval_count'],
        // Enter the currency of the plan here.
        PayUParameters::PLAN_CURRENCY => $data['plan_currency'],
        // Enter the value of the plan here.
        PayUParameters::PLAN_VALUE => $data['plan_value'],
        // (OPTIONAL) Enter the tax value here.
        PayUParameters::PLAN_TAX => $data['plan_tax'],
        // (OPTIONAL) Enter the tax base return here.
        PayUParameters::PLAN_TAX_RETURN_BASE => $data['plan_tax_return_base'],
        // Enter the account ID of the plan here.
        PayUParameters::ACCOUNT_ID => $data['account_id'],
        // Enter the retry interval here
        PayUParameters::PLAN_ATTEMPTS_DELAY => $data['plan_attempts_delay'],
        // Enter the amount of charges that make up the plan here
        PayUParameters::PLAN_MAX_PAYMENTS => $data['plan_max_payments'],
        // Enter the total amount of retries here for each rejected subscription payment
        PayUParameters::PLAN_MAX_PAYMENT_ATTEMPTS => $data['plan_max_payment_attempts'],
        // Enter the maximum amount of pending payments here that a subscription may have before being canceled.
        PayUParameters::PLAN_MAX_PENDING_PAYMENTS => $data['plan_max_pending_payments'],
        // Enter the amount of trial days of the subscription here.
        PayUParameters::TRIAL_DAYS => $data['trial_days'],
      );
    }

    if ($data['all_existing']){
      return array(
        // Enter the plan code to subscribe
        PayUParameters::PLAN_CODE => $data['plan_code'],
        //Enter the payer's ID here.
        PayUParameters::CUSTOMER_ID => $data['customer_id'],
        /// Enter the credit card’s token identifier here.
        PayUParameters::TOKEN_ID => $data['token_id'],
        // Enter the amount of trial days of the subscription here.
        PayUParameters::TRIAL_DAYS => $data['trial_days'],
        //Enter the number of installments here.
        PayUParameters::INSTALLMENTS_NUMBER => $data['installments_number'],
      );
    }

    if ($data['plan_and_customer_created_and_new_card']){
      return array(
        //Enter the number of installments here.
        PayUParameters::INSTALLMENTS_NUMBER => $data['installments_number'],
        // Enter the amount of trial days here.
        PayUParameters::TRIAL_DAYS => $data['trial_days'],

        // -- Client parameters --
        //Enter the payer's ID here.
        PayUParameters::CUSTOMER_ID => $data['customer_id'],

        //-- Credit card parameters --
        //Enter the buyer's name here.
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
        PayUParameters::PAYER_PHONE => $data['payer_phone'],

        // -- Plan parameters --
        // Enter the plan code to subscribe
        PayUParameters::PLAN_CODE => "sample-plan-code-001",
      );
    }

    if ($data['customer_and_card_createdand_with_new plan']){
      return array(
        //Enter the number of installments here.
        PayUParameters::INSTALLMENTS_NUMBER => $data['installments_number'],
        // Enter the amount of trial days here.
        PayUParameters::TRIAL_DAYS => $data['trial_days'],

        //-- Credit card parameters --
        //Enter the payer's ID here.
        PayUParameters::CUSTOMER_ID => $data['customer_id'],
        // Enter the credit card’s token identifier here.
        PayUParameters::TOKEN_ID => $data['token_id'],

        // -- Plan parameters --
        // Enter the plan‘s description here.
        PayUParameters::PLAN_DESCRIPTION => $data['plan_description'],
        // Enter the identification code of the plan here.
        PayUParameters::PLAN_CODE => $data['plan_code'],
        // Enter the interval of the plan here.
        PayUParameters::PLAN_INTERVAL => $data['plan_interval'],
        // Enter the number of intervals here.
        PayUParameters::PLAN_INTERVAL_COUNT => $data['plan_interval_count'],
        // Enter the currency of the plan here.
        PayUParameters::PLAN_CURRENCY => $data['plan_currency'],
        // Enter the value of the plan here.
        PayUParameters::PLAN_VALUE => $data['plan_value'],
        // (OPTIONAL) Enter the tax value here.
        PayUParameters::PLAN_TAX => $data['plan_tax'],
        // (OPTIONAL) Enter the tax base return here.
        PayUParameters::PLAN_TAX_RETURN_BASE => $data['plan_tax_return_base'],
        // Enter the account ID of the plan here.
        PayUParameters::ACCOUNT_ID => $data['account_id'],
        // Enter the retry interval here
        PayUParameters::PLAN_ATTEMPTS_DELAY => $data['plan_attempts_delay'],
        // Enter the amount of charges that make up the plan here
        PayUParameters::PLAN_MAX_PAYMENTS => $data['plan_max_payments'],
        // Enter the total amount of retries here for each rejected subscription payment
        PayUParameters::PLAN_MAX_PAYMENT_ATTEMPTS => $data['plan_max_payment_attempts'],
        // Enter the maximum amount of pending payments here that a subscription may have before being canceled.
        PayUParameters::PLAN_MAX_PENDING_PAYMENTS => $data['plan_max_pending_payments'],
        // Enter the amount of trial days of the subscription here.
        PayUParameters::TRIAL_DAYS => $data['trial_days'],
      );
    }

    return [];
  }

}
