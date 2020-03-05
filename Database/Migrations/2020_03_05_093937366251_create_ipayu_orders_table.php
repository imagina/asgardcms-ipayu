<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpayuOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipayu__orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('merchant_id');
            $table->string('state_pol');
            $table->string('risk');
            $table->string('response_code_pol');
            $table->string('reference_sale');
            $table->string('reference_pol');
            $table->string('sign');
            $table->string('extra1');
            $table->string('extra2');
            $table->string('payment_method');
            $table->string('payment_method_type');
            $table->string('installments_number');
            $table->string('value');
            $table->string('tax');
            $table->string('additional_value');
            $table->string('transaction_date');
            $table->string('currency');
            $table->string('email_buyer');
            $table->string('cus');
            $table->string('pse_bank');
            $table->string('test');
            $table->string('description');
            $table->string('billing_address');
            $table->string('shipping_address');
            $table->string('phone');
            $table->string('office_phone');
            $table->string('account_number_ach');
            $table->string('account_type_ach');
            $table->string('administrative_fee');
            $table->string('administrative_fee_base');
            $table->string('administrative_fee_tax');
            $table->string('airline_code');
            $table->string('attempts');
            $table->string('authorization_code');
            $table->string('travel_agency_authorization_code');
            $table->string('bank_id');
            $table->string('billing_city');
            $table->string('billing_country');
            $table->string('commision_pol');
            $table->string('commision_pol_currency');
            $table->string('customer_number');
            $table->string('date');
            $table->string('error_code_bank');
            $table->string('error_message_bank');
            $table->string('exchange_rate');
            $table->string('ip');
            $table->string('nickname_buyer');
            $table->string('nickname_seller');
            $table->string('payment_method_id');
            $table->string('payment_request_state');
            $table->string('pseReference1');
            $table->string('pseReference2');
            $table->string('pseReference3');
            $table->string('response_message_pol');
            $table->string('shipping_city');
            $table->string('shipping_country');
            $table->string('transaction_bank_id');
            $table->string('transaction_id');
            $table->string('payment_method_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ipayu__orders');
    }
}
