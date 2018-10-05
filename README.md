# ItsmeApiClient
PHP client to connect to the [itsme API](https://docs.cmtelecom.com/itsme/v1).

## Installation
The package is available via composer:

```Bash
$ composer require nascom/itsme-api-client
```

## Basic usage
First, you'll need to provide a client that can make HTTP requests.
You can use this GuzzleHttp to instantiate the actual API client.
You'll have to provide your Teamleader API credentials as well.
```php
<?php

use Nascom\ItsmeApiClient\Http\ApiClient\ApiClient;
use Nascom\ItsmeApiClient\Http\ApiClient\Service

$guzzleClient = new \GuzzleHttp\Client(['base_uri' => Service::PRODUCTION]);

$client = new ApiClient($guzzleClient);
```

### Making requests
Every API endpoint has a corresponding Request class. These classes have to
be passed to the client's `handle()` method.

Creating a transaction:
```php
<?php

use Nascom\ItsmeApiClient\Request\Transaction\CreateTransactionRequest;

$transactionRequest = new CreateTransactionRequest($token, $service, $redirectUrl);
$transation = $client->handle($transactionRequest);

echo $transation->getAuthenticationUrl();
```

Retrieve status after validation of itsme:
```php
<?php

use Nascom\ItsmeApiClient\Request\Status\RetrieveStatusRequest;

$statusRequest = new RetrieveStatusRequest($_SESSION['token']);
$status = $client->handle($statusRequest);

echo $status->getEmailAddress();
```