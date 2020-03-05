<?php

namespace Modules\Ipayu\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class OrderTransformer extends Resource
{
    public function toArray($request)
    {
        $data = [
        'id' => $this->when($this->id, $this->id),

        'merchantId' => $this->when($this->merchant_id, $this->merchant_id),
        'statePol' => $this->when($this->state_pol, $this->state_pol),
        'risk' => $this->when($this->risk, $this->risk),
        'responseCodePol' => $this->when($this->response_code_pol, $this->response_code_pol),
        'referenceSale' => $this->when($this->reference_sale, $this->reference_sale),
        'referencePol' => $this->when($this->reference_pol, $this->reference_pol),
        'sign' => $this->when($this->sign, $this->sign),
        'extra1' => $this->when($this->extra1, $this->extra1),
        'extra2' => $this->when($this->extra2, $this->extra2),
        'paymentMethod' => $this->when($this->payment_method, $this->payment_method),
        'paymentMethodType' => $this->when($this->payment_method_type, $this->payment_method_type),
        'installmentsNumber' => $this->when($this->installments_number, $this->installments_number),
        'value' => $this->when($this->value, $this->value),
        'tax' => $this->when($this->tax, $this->tax),
        'additionalValue' => $this->when($this->additional_value, $this->additional_value),
        'transactionDate' => $this->when($this->transaction_date, $this->transaction_date),
        'currency' => $this->when($this->currency, $this->currency),
        'emailBuyer' => $this->when($this->email_buyer, $this->email_buyer),
        'cus' => $this->when($this->cus, $this->cus),
        'pseBank' => $this->when($this->pse_bank, $this->pse_bank),
        'test' => $this->when($this->test, $this->test),
        'description' => $this->when($this->description, $this->description),
        'billingAddress' => $this->when($this->billing_address, $this->billing_address),
        'shippingAddress' => $this->when($this->shipping_address, $this->shipping_address),
        'phone' => $this->when($this->phone, $this->phone),
        'officePhone' => $this->when($this->office_phone, $this->office_phone),
        'accountNumberAch' => $this->when($this->account_number_ach, $this->account_number_ach),
        'accountTypeAch' => $this->when($this->account_type_ach, $this->account_type_ach),
        'administrativeFee' => $this->when($this->administrative_fee, $this->administrative_fee),
        'administrativeFeeBase' => $this->when($this->administrative_fee_base, $this->administrative_fee_base),
        'administrativeFeeTax' => $this->when($this->administrative_fee_tax, $this->administrative_fee_tax),
        'airlineCode' => $this->when($this->airline_code, $this->airline_code),
        'attempts' => $this->when($this->attempts, $this->attempts),
        'authorizationCode' => $this->when($this->authorization_code, $this->authorization_code),
        'travelAgencyAuthorizationCode' => $this->when($this->travel_agency_authorization_code, $this->travel_agency_authorization_code),
        'bankId' => $this->when($this->bank_id, $this->bank_id),
        'billingCity' => $this->when($this->billing_city, $this->billing_city),
        'billingCountry' => $this->when($this->billing_country, $this->billing_country),
        'commisionPol' => $this->when($this->commision_pol, $this->commision_pol),
        'commisionPolCurrency' => $this->when($this->commision_pol_currency, $this->commision_pol_currency),
        'customerNumber' => $this->when($this->customer_number, $this->customer_number),
        'date' => $this->when($this->date, $this->date),
        'errorCodeBank' => $this->when($this->error_code_bank, $this->error_code_bank),
        'errorMessageBank' => $this->when($this->error_message_bank, $this->error_message_bank),
        'exchangeRate' => $this->when($this->exchange_rate, $this->exchange_rate),
        'ip' => $this->when($this->ip, $this->ip),
        'nicknameBuyer' => $this->when($this->nickname_buyer, $this->nickname_buyer),
        'nicknameSeller' => $this->when($this->nickname_seller, $this->nickname_seller),
        'paymentMethodId' => $this->when($this->payment_method_id, $this->payment_method_id),
        'paymentRequestState' => $this->when($this->payment_request_state, $this->payment_request_state),
        'pseReference1' => $this->when($this->pseReference1, $this->pseReference1),
        'pseReference2' => $this->when($this->pseReference2, $this->pseReference2),
        'pseReference3' => $this->when($this->pseReference3, $this->pseReference3),
        'responseMessagePol' => $this->when($this->response_message_pol, $this->response_message_pol),
        'shippingCity' => $this->when($this->shipping_city, $this->shipping_city),
        'shippingCountry' => $this->when($this->shipping_country, $this->shipping_country),
        'transactionBankId' => $this->when($this->transaction_bank_id, $this->transaction_bank_id),
        'transactionId' => $this->when($this->transaction_id, $this->transaction_id),
        'paymentMethodName' => $this->when($this->payment_method_name, $this->payment_method_name),
    ];

    return $data;

    }
}
