<?php

namespace Modules\Ipayu\Facades;

use Illuminate\Support\Facades\Facade;

class Plan extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'plan';
  }
}
