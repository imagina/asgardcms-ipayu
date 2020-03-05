<?php

namespace Modules\Ipayu\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class CreditCardTransformer extends Resource
{
    public function toArray($request)
    {
        $data = [
        'id' => $this->when($this->id, $this->id),
        'userId' => $this->when($this->user_id, $this->user_id),
        'creditcardName' => $this->when($this->creditcard_name, $this->creditcard_name),
        'creditcardNumber' => $this->when($this->creditcard_number, $this->creditcard_number),
        'creditcardType' => $this->when($this->creditcard_type, $this->creditcard_type),
        'creditcardExpirationDate' => $this->when($this->creditcard_expiration_date, $this->creditcard_expiration_date),
    ];

    return $data;

    }
}
