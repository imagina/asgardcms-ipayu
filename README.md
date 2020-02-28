# Asgardcms-ipayu

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

  * Ping
  * Order By identifier
  * Order By Reference
  * Response Transactions

#### Recurring Payments
Automated recurring payments are payments that are performed periodically (daily, monthly, annually), of consumption charges like goods or services such as memberships, subscriptions, policies or receipts with a fixed value that were previously authorized by the customer.

  * Plan  
  Using this feature you can register the credit card data from a customer and get a token sequence number.  
  The following operations are available:  
    * Creation
    * Update
    * Query
    * Delete
    
  * Customer   
  A customer is the unit that identifies who will be the beneficiary of a provided product or service and is associated with a recurring payment plan
    * Creation
    * Update
    * Query
    * Delete
    
  * Credit card   
  Is the payment mean with which a Plan and Payer relates, is composed of the number of credit card (which will be tokenized to store data securely), the expiration date of the card and some data additional steering.  
    * Creation
    * Update
    * Query
    * Delete
    
  * Subscription   
  A subscription is the relationship between a payment plan, a payer and a credit card and it is the element that controls the execution of the respective charges. 
    * Creation
    * Update
    * Query
    * Delete
    
  * Additional charges   
  A charge may be an additional charge or a discount realized on the value of one of the payments that comprise the recurring payment plan. These only affect the next pending charge and run once.  
    * Creation
    * Update
    * Query
    * Delete


