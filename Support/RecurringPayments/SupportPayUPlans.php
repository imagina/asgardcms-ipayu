<?php

namespace Modules\Ipayu\Support\RecurringPayments;

use Modules\Ipayu\Support\SupportPayU;

use PayUParameters;
use PayUSubscriptionPlans;

class SupportPayUPlans extends SupportPayU
{

  public function creation ($data)
  {
    $parameters = array(
      // Enter the plan‘s description here.
      PayUParameters::PLAN_DESCRIPTION => $data['plan_description'],
      // Enter the identification code of the plan here.
      PayUParameters::PLAN_CODE => $data['plan_code'],
      // Enter the interval of the plan here.
      //DAY||WEEK||MONTH||YEAR
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

    $response = PayUSubscriptionPlans::create($parameters, $data);
    return $response;
  }

  public function update ($criteria, $data)
  {
    $parameters = array(
      // Enter the plan‘s description here.
      PayUParameters::PLAN_DESCRIPTION => $data['plan_description'],
      // Enter the identification code of the plan here.
      PayUParameters::PLAN_CODE => $criteria,
      // Enter the currency of the plan here.
      PayUParameters::PLAN_CURRENCY => $data['plan_currency'],
      // Enter the value of the plan here.
      PayUParameters::PLAN_VALUE => $data['plan_value'],
      // (OPTIONAL) Enter the tax value here.
      PayUParameters::PLAN_TAX => $data['plan_tax'],
      // (OPTIONAL) Enter the tax base return here.
      PayUParameters::PLAN_TAX_RETURN_BASE => $data['plan_tax_return_base'],
      // Enter the retry interval here
      PayUParameters::PLAN_ATTEMPTS_DELAY => $data['plan_attempts_delay'],
      // Enter the total amount of retries here for each rejected subscription payment
      PayUParameters::PLAN_MAX_PAYMENT_ATTEMPTS => $data['plan_max_payment_attempts'],
      // Enter the maximum amount of pending payments here that a subscription may have before being canceled.
      PayUParameters::PLAN_MAX_PENDING_PAYMENTS => $data['plan_max_pending_payments'],
    );

    $response = PayUSubscriptionPlans::update($parameters);
    return $response;
  }

  public function query ($criteria)
  {
    $parameters = array(
      // Enter the identification code of the plan here.
      PayUParameters::PLAN_CODE => $criteria,
    );

    $response = PayUSubscriptionPlans::find($parameters);
    return $response;
  }

  public function delete ($criteria)
  {
    $parameters = array(
      // Enter the identification code of the plan here.
      PayUParameters::PLAN_CODE => $criteria,
    );

    $response = PayUSubscriptionPlans::delete($parameters);
    return $response;
  }

}
