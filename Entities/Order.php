<?php

namespace Modules\Ipayu\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'ipayu__orders';

    protected $fillable = [
        'merchant_id',
        'state_pol',
        'risk',
        'response_code_pol',
        'reference_sale',
        'reference_pol',
        'sign',
        'extra1',
        'extra2',
        'payment_method',
        'payment_method_type',
        'installments_number',
        'value',
        'tax',
        'additional_value',
        'transaction_date',
        'currency',
        'email_buyer',
        'cus',
        'pse_bank',
        'test',
        'description',
        'billing_address',
        'shipping_address',
        'phone',
        'office_phone',
        'account_number_ach',
        'account_type_ach',
        'administrative_fee',
        'administrative_fee_base',
        'administrative_fee_tax',
        'airline_code',
        'attempts',
        'authorization_code',
        'travel_agency_authorization_code',
        'bank_id',
        'billing_city',
        'billing_country',
        'commision_pol',
        'commision_pol_currency',
        'customer_number',
        'date',
        'error_code_bank',
        'error_message_bank',
        'exchange_rate',
        'ip',
        'nickname_buyer',
        'nickname_seller',
        'payment_method_id',
        'payment_request_state',
        'pseReference1',
        'pseReference2',
        'pseReference3',
        'response_message_pol',
        'shipping_city',
        'shipping_country',
        'transaction_bank_id',
        'transaction_id',
        'payment_method_name',
    ];
}
