<?php

namespace Modules\Ipayu\Entities;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $table = 'ipayu__creditcards';

    protected $fillable = [
        'token',
        'user_id',
        'creditcard_name',
        'creditcard_number',
        'creditcard_type',
        'creditcard_expiration_date',
    ];
}
