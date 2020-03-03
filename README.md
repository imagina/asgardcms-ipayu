# Asgardcms-ipayu
## Imagina Colombia

### Installation

```ssh
composer require imagina/ipayu-module
```

### Configuration

Access your asgard administrator, go to the ipayu settings and enter the requested data

* payUisTest
* payUapiKey
* payUapiLogin
* payUmerchantId
* payUlanguage
* setPaymentsCustomUrl
* setReportsCustomUrl
* setSubscriptionsCustomUrl


### API

#### Queries

  * **Ping**
  
    GET: ``/api/ipayu/v1/queries/ping ``
    ```
    {
      "data": {
        "code": "SUCCESS",
        "result": {
          "payload": "ping"
        }
      }
    }
    ```
    
#### Recurring Payments
Automated recurring payments are payments that are performed periodically (daily, monthly, annually), of consumption charges like goods or services such as memberships, subscriptions, policies or receipts with a fixed value that were previously authorized by the customer.

  * **Plan:** Using this feature you can register the credit card data from a customer and get a token sequence number.  
  The following operations are available:  
    * Creation
    
      **POST** ``/api/ipayu/v1/plans``
      
      **Attributes**
      ```
      {
        "attributes": {
          "plan_description": "imagina test", // Ingresa aquí la descripción del plan
          "plan_code": "imagina-test", // Ingresa aquí el código de identificación para el plan
          "plan_interval": "MONTH", //DAY||WEEK||MONTH||YEAR
          "plan_interval_count": 1, // Ingresa aquí la cantidad de intervalos
          "plan_currency": "COP", // Ingresa aquí la moneda para el plan
          "plan_value": 10000, // Ingresa aquí el valor del plan
          "plan_tax": 1600, // Ingresa aquí el valor del impuesto
          "plan_tax_return_base": 8400, // Ingresa aquí la base de devolución sobre el impuesto
          "account_id": "512321", // Ingresa aquí la cuenta Id del plan
          "plan_attempts_delay": 1, // Ingresa aquí el intervalo de reintentos
          "plan_max_payments": 12, // Ingresa aquí la cantidad de cobros que componen el plan
          "plan_max_payment_attempts": 3, // Ingresa aquí la cantidad total de reintentos para cada pago rechazado de la suscripción
          "plan_max_pending_payments": 1, // Ingresa aquí la cantidad máxima de pagos pendientes que puede tener una suscripción antes de ser cancelada.
          "trial_days": 30 // Ingresa aquí la cantidad de días de prueba de la suscripción.
        }
      }
      ```
      
      **Response** 
      ```
      {
        "data": {
          "id": "692765fc-5f0b-4829-9da9-2ec5f8ca2c46",
          "planCode": "imagina-test",
          "description": "imagina test",
          "accountId": "512321",
          "intervalCount": 1,
          "interval": "MONTH",
          "maxPaymentsAllowed": 12,
          "maxPaymentAttempts": 3,
          "paymentAttemptsDelay": 1,
          "maxPendingPayments": 1,
          "trialDays": 0,
          "additionalValues": [
            {
              "name": "PLAN_TAX",
              "value": 1600,
              "currency": "COP"
            },
            {
              "name": "PLAN_VALUE",
              "value": 10000,
              "currency": "COP"
            },
            {
              "name": "PLAN_TAX_RETURN_BASE",
              "value": 8400,
              "currency": "COP"
            }
          ]
        }
      }
      ```
    
    * **Update**
    
      **PUT:** ``/api/ipayu/v1/plans/{PLAN-CODE}``
      
      **Attributes**
      ```
      {
        "attributes": {
          "plan_description": "imagina test Updated",
          "plan_code": "imagina-test",
          "plan_interval": "MONTH",
          "plan_interval_count": 1,
          "plan_currency": "COP",
          "plan_value": 10000,
          "plan_tax": 1600,
          "plan_tax_return_base": 8400,
          "account_id": "512321",
          "plan_attempts_delay": 1,
          "plan_max_payments": 12,
          "plan_max_payment_attempts": 3,
          "plan_max_pending_payments": 1,
          "trial_days": 30
        }
      }
      ```
      **Response**
      ```
      {
        "data": {
          "id": "692765fc-5f0b-4829-9da9-2ec5f8ca2c46",
          "planCode": "imagina-test",
          "description": "imagina test Updated",
          "accountId": "512321",
          "intervalCount": 1,
          "interval": "MONTH",
          "maxPaymentsAllowed": 12,
          "maxPaymentAttempts": 3,
          "paymentAttemptsDelay": 1,
          "maxPendingPayments": 1,
          "trialDays": 0,
          "additionalValues": [
            {
              "name": "PLAN_TAX_RETURN_BASE",
              "value": 8400,
              "currency": "COP"
            },
            {
              "name": "PLAN_TAX",
              "value": 1600,
              "currency": "COP"
            },
            {
              "name": "PLAN_VALUE",
              "value": 10000,
              "currency": "COP"
            }
          ]
        }
      }
      ```
      
    * **Query**
    
      **GET:** ``/api/ipayu/v1/plans/imagina-test``
      
      **Response**
      ```
      {
        "data": {
          "id": "692765fc-5f0b-4829-9da9-2ec5f8ca2c46",
          "planCode": "imagina-test",
          "description": "imagina test",
          "accountId": "512321",
          "intervalCount": 1,
          "interval": "MONTH",
          "maxPaymentsAllowed": 12,
          "maxPaymentAttempts": 3,
          "paymentAttemptsDelay": 1,
          "maxPendingPayments": 1,
          "trialDays": 0,
          "additionalValues": [
            {
              "name": "PLAN_TAX_RETURN_BASE",
              "value": 8400,
              "currency": "COP"
            },
            {
              "name": "PLAN_TAX",
              "value": 1600,
              "currency": "COP"
            },
            {
              "name": "PLAN_VALUE",
              "value": 10000,
              "currency": "COP"
            }
          ]
        }
      }
      ```
    * **Delete**
    
    **DELETE:** ``/api/ipayu/v1/plans/{PLAN-CODE}``
    
    **Response**
    ```
    {
      "data": true
    }
    ```
    
  * **Customer:** A customer is the unit that identifies who will be the beneficiary of a provided product or service and is associated with a recurring payment plan
    * Creation
    
    **POST:** ``/api/ipayu/v1/customers``
    
      **Attributes**
      ```
      {
        "attributes": {
          "customer_name": "Imagina Colombia",
          "customer_email": "soporte@imaginacolombia.com"
        }
      }
      ```
      
      **Response**
      ```
      {
        "data": {
          "id": "b15510e2hog7",
          "fullName": "Imagina Colombia",
          "email": "soporte@imaginacolombia.com"
        }
      }
      ```
 
    * **Update**
    
      **PUT:** ``/api/ipayu/v1/customers/{ID-CUSTOMER}``
      
      **Attributes**
      ```
      {
        "attributes": {
          "customer_name": "Imagina Colombia update",
          "customer_email": "soporte@imaginacolombia.com"
        }
      }
      ```
      
      **Response**
      ```
      {
        "data": {
          "id": "b15510e2hog7",
          "fullName": "Imagina Colombia update",
          "email": "soporte@imaginacolombia.com"
        }
      }
      ```
    
    * **Query**
    
      **GET:** ``/api/ipayu/v1/customers/ID-CUSTOMER``
      
      **Response:**
      
      ```
      {
        "data": {
          "id": "b15510e2hog7",
          "fullName": "Imagina Colombia update",
          "email": "soporte@imaginacolombia.com"
        }
      }
      ```
    
    * **Delete**
    
      **DELETE:** ``/api/ipayu/v1/customers/ID-CUSTOMER``
      
      ```
      {
        "data": {
          "description": "The customer [b15510e2hog7] has been deleted"
        }
      }
      ```
    
  * **Credit card:** Is the payment mean with which a Plan and Payer relates, is composed of the number of credit card (which will be tokenized to store data securely), the expiration date of the card and some data additional steering.  
    * **Creation**
    
      **POST:** ``/api/ipayu/v1/credit-cards``
      
      **Attributes**
      ```
      {
        "attributes": {
          "customer_id": "4d341cr3b3xb",
          "payer_name": "Pedro Perez",
          "credit_card_number": "4242424242424242",
          "credit_card_expiration_date": "2020/12",
          "payment_method": "VISA",
          "credit_card_document": "1020304050",
          "payer_dni": "101010123",
          "payer_street": "Street 93B",
          "payer_street_2": "17 25",
          "payer_street_3": "Office 301",
          "payer_city": "Bogotá",
          "payer_state": "Bogotá D.C.",
          "payer_country": "CO",
          "payer_postal_code": "00000",
          "payer_phone": "300300300"
        }
      }
      ```
      
      **Response**
      ```
      {
        "data": {
          "token": "d7387e50-9d23-4bbb-8f32-bcd6d79874cf"
        }
      }
      ```
      
    * **Update**
    
      **PUT:** ``/api/ipayu/v1/credit-cards/{TOKEN-ID}``
      
      **Attributes**
      ```
      {
        "attributes": {
          "customer_id": "4d341cr3b3xb",
          "payer_name": "Pedro Perez",
          "credit_card_number": "4242424242424242",
          "credit_card_expiration_date": "2020/12",
          "payment_method": "VISA",
          "credit_card_document": "1020304050",
          "payer_dni": "101010123",
          "payer_street": "Street 93B",
          "payer_street_2": "17 25",
          "payer_street_3": "Office 301",
          "payer_city": "Bogotá",
          "payer_state": "Bogotá D.C.",
          "payer_country": "CO",
          "payer_postal_code": "00000",
          "payer_phone": "300300300"
        }
      }
      ```
          
      **Response**
      ```
      {
        "data": {
          "token": "d7387e50-9d23-4bbb-8f32-bcd6d79874cf"
        }
      }
      ```
      
    * **Query**
    
      **GET:** ``/api/ipayu/v1/credit-cards/{TOKEN-ID}``
    
      **Response**
      
      ```
      {
        "data": {
          "token": "d7387e50-9d23-4bbb-8f32-bcd6d79874cf",
          "customerId": "4d341cr3b3xb",
          "number": "424242******4242",
          "type": "VISA",
          "name": "Juan Perez",
          "document": "1020304050",
          "address": {
          "line1": "Street 93B",
          "line2": "17 25",
          "line3": "Office 301",
          "city": "Bogotá",
          "state": "Bogotá D.C.",
          "country": "CO",
          "postalCode": "00000",
          "phone": "300300300"
          }
        }
      }
      ```
     
    * **Delete**
    
      **DELETE:** ``/api/ipayu/v1/credit-cards/{TOKEN-ID}``
    
      **Response**
      ```
      {
        "data": true
      }
      ```
    
  * **Subscription:** A subscription is the relationship between a payment plan, a payer and a credit card and it is the element that controls the execution of the respective charges. 
    * **Creation**
    
      **POST:** ``/api/ipayu/v1/subscriptions``
      
      * **With all new items**
        
        **Attributes**
        ```
        {
          "attributes": {
            "all_new": true,
            "installments_number": "",
            "trial_days": "",
            "customer_name": "",
            "customer_email": "",
            "payer_name": "",
            "credit_card_number": "",
            "credit_card_expiration_date": "",
            "payment_method": "",
            "credit_card_document": "",
            "payer_dni": "",
            "payer_street": "",
            "payer_street_2": "",
            "payer_street_3": "",
            "payer_city": "",
            "payer_state": "",
            "payer_country": "",
            "payer_postal_code": "",
            "payer_phone": "",
            "plan_description": "",
            "plan_code": "",
            "plan_interval": "",
            "plan_interval_count": "",
            "plan_currency": "",
            "plan_value": "",
            "plan_tax": "",
            "plan_tax_return_base": "",
            "account_id": "",
            "plan_attempts_delay": "",
            "plan_max_payments": "",
            "plan_max_payment_attempts": "",
            "plan_max_pending_payments": "",
            "trial_days": "",
          }
        }
        ```
        
        **Response**
        ```
        {
          "data": {
            
          }
        }
        ```
        
      * **With all existing items**

        **Attributes**
        ```
        {
          "attributes": {
            "all_existing": true,
            "plan_code": "",
            "customer_id": "",
            "token_id": "",
            "trial_days": "",
            "installments_number": "",
          }
        }
        ```
        
        **Response**
        ```
        {
          "data": {
            
          }
        }
        ```
        
      * **Already created plan and customer, and a new card**

        **Attributes**
        ```
        {
          "attributes": {
            "plan_and_customer_created_and_new_card": true,
            "installments_number": "",
            "trial_days": "",
            "customer_id": "",
            "payer_name": "",
            "credit_card_number": "",
            "credit_card_expiration_date": "",
            "payment_method": "",
            "credit_card_document": "",
            "payer_dni": "",
            "payer_street": "",
            "payer_street_2": "",
            "payer_street_3": "",
            "payer_city": "",
            "payer_state": "",
            "payer_country": "",
            "payer_postal_code": "",
            "payer_phone": "",
            "plan_code": "",
          }
        }
          ```
        
        **Response**
        ```
        {
          "data": {
            
          }
        }
        ```
        
      * **Already created customer and card, and with new plan**

        **Attributes**
        ```
        {
          "attributes": {
            "customer_and_card_createdand_with_new_plan": true,
            "installments_number": "",
            "trial_days": "",
            "customer_id": "",
            "token_id": "",
            "plan_description": "",
            "plan_code": "",
            "plan_interval": "",
            "plan_interval_count": "",
            "plan_currency": "",
            "plan_value": "",
            "plan_tax": "",
            "plan_tax_return_base": "",
            "account_id": "",
            "plan_attempts_delay": "",
            "plan_max_payments": "",
            "plan_max_payment_attempts": "",
            "plan_max_pending_payments": "",
            "trial_days": "",
          }
        }
        ```
        
        **Response**
        ```
        {
          "data": {
            
          }
        }
        ```
        
    * **Delete**
    
      **DELETE:** ``/api/ipayu/v1/subscriptions/{SUBSCRIPTION-ID}``
      
      **Response**
      ```
      {
        "data": true
      }
      ```
      
  * **Additional charges:** A charge may be an additional charge or a discount realized on the value of one of the payments that comprise the recurring payment plan. These only affect the next pending charge and run once.
    
    * **Creation**
    
    **POST** ``/api/ipayu/v1/additional-charges``
    
      **Attributes**
      ```
        {
          "attributes": {
            "description": "",
            "item_value": "",
            "currency": "",
            "subscription_id": "",
            "item_tax_return_base": "",
          }
        }
      ```
      
      **Response**
      ```
      {
        "data": {
      
        }
      }
      ```
    
    * **Update**
    
      **POST** ``/api/ipayu/v1/additional-charges/{RECURRING-BILL-ITEM-ID}``
      
      **Attributes**
      ```
      {
        "attributes": {
          "description": "",
          "item_value": "",
          "currency": "",
          "subscription_id": "",
          "item_tax_return_base": "",
        }
      }
      ```
      
      **Response**
      ```
      {
        "data": {
        
        }
      }
      ```
    
    * **Query**
    
      **POST** ``/api/ipayu/v1/'additional-charges/{RECURRING-BILL-ITEM-ID}``
      
      **Response**
      ```
      {
        "data": {
        
        }
      }
      ```
    
    * **Delete**
    
      **POST** ``/api/ipayu/v1/additional-charges/{RECURRING-BILL-ITEM-ID}``
            
      **Response**
      ```
      {
        "data": {
        
        }
      }
      ```
      
### Facades

#### Plan

Example use
```php
namespace ...

use Modules\Ipayu\Facades\Plan;

class myClass {
  public function myFunction (){
    $data = [...];
    Plan::creation($data);
  }
}
```
now, you have access to all method of the class `SupportPayUPlans`


