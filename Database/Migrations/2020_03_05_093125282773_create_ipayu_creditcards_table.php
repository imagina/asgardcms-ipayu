<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpayuCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipayu__creditcards', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('token');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('restrict');
            $table->string('creditcard_name');
            $table->string('creditcard_number');
            $table->string('creditcard_type');
            $table->string('creditcard_expiration_date');
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
        Schema::dropIfExists('ipayu__creditcards');
    }
}
