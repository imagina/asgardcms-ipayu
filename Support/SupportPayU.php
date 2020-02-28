<?php

namespace Modules\Ipayu\Support;

use Modules\Setting\Contracts\Setting;
use PayU;
use Environment;

class SupportPayU
{
  private $setting;

  public function __construct(Setting $setting)
  {
    $this->setting = $setting;
    $this->setPayUEnvironment();
  }

  private function setPayUEnvironment () {
    PayU::$apiKey = $this->setting->get('ipayu::payUapiKey');
    PayU::$apiLogin = $this->setting->get('ipayu::payUapiLogin');
    PayU::$merchantId = $this->setting->get('ipayu::payUmerchantId');
    PayU::$language = $this->setting->get('ipayu::payUlanguage');
    PayU::$isTest = $this->setting->get('ipayu::payUisTest') == "1" ? true : false;
    Environment::setPaymentsCustomUrl($this->setting->get('ipayu::setPaymentsCustomUrl'));
    Environment::setReportsCustomUrl($this->setting->get('ipayu::setReportsCustomUrl'));
    Environment::setSubscriptionsCustomUrl($this->setting->get('ipayu::setSubscriptionsCustomUrl'));
  }
}
