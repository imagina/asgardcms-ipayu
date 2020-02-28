<?php

namespace Modules\Ipayu\Support\RecurringPayments;

use Modules\Ipayu\Support\SupportPayU;

use PayUParameters;
use PayURecurringBillItem;

class SupportPayUAdditionalCharges extends SupportPayU
{

  public function creation ($data)
  {
    $parameters = array(
      // Additional charge description
      PayUParameters::DESCRIPTION => $data['description'],
      // Value of the additional charge
      PayUParameters::ITEM_VALUE => $data['item_value'],
      // Currency
      PayUParameters::CURRENCY => $data['currency'],
      // Enter the subscription ID here.
      PayUParameters::SUBSCRIPTION_ID => $data['subscription_id'],
      // Enter the taxes here (optional)
      PayUParameters::ITEM_TAX => $data['item_tax'],
      // Devolution base of the taxes (optional)
      PayUParameters::ITEM_TAX_RETURN_BASE => $data['item_tax_return_base'],
    );
    $response = PayURecurringBillItem::create($parameters);
    return $response;
  }

  public function update ($criteria, $data)
  {
    $parameters = array(
      // Additional charge ID
      PayUParameters::RECURRING_BILL_ITEM_ID => $criteria,
      // Additional charge description
      PayUParameters::DESCRIPTION => $data['description'],
      // Value of the additional charge
      PayUParameters::ITEM_VALUE => $data['item_value'],
      // Currency
      PayUParameters::CURRENCY => $data['currency'],
      // Enter the taxes here (optional)
      PayUParameters::ITEM_TAX => $data['item_tax'],
      // Devolution base of the taxes (optional)
      PayUParameters::ITEM_TAX_RETURN_BASE => $data['item_tax_return_base'],
    );
    $response = PayURecurringBillItem::update($parameters);
    return $response;
  }

  public function query ($criteria)
  {
    $parameters = array(
      // Additional charge ID
      PayUParameters::RECURRING_BILL_ITEM_ID => $criteria,
    );

    $response = PayURecurringBillItem::find($parameters);
    return $response;
  }

  public function delete ($criteria)
  {
    $parameters = array(
      // Additional charge ID
      PayUParameters::RECURRING_BILL_ITEM_ID => $criteria,
    );

    $response = PayURecurringBillItem::delete($parameters);
    return $response;
  }

}
