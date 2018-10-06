# ItsmeApiClient
PHP client to connect to the [itsme API](https://docs.cmtelecom.com/itsme/v1).

## Installation
The package is available via composer:

```Bash
$ composer require nascom/itsme-api-client
```

## Basic usage
First, you'll need to provide a client that can make HTTP requests. For now,
only Guzzle is supported.

```php
<?php

use Nascom\ItsmeApiClient\Http\ApiClient\ApiClient;
use Nascom\ItsmeApiClient\Http\ApiClient\Service;
use Nascom\ItsmeApiClient\Http\ApiClient\ApiClientFactory;

$guzzleClient = new \GuzzleHttp\Client(['base_uri' => Service::PRODUCTION]);
$client = new ApiClient($guzzleClient);

// Alternatively, you can use the ApiClientFactory.
$client = ApiClientFactory::production();
```

### Making requests
Every API endpoint has a corresponding Request class. These classes have to
be passed to the client's `handle()` method.

Creating a transaction:
```php
<?php

use Nascom\ItsmeApiClient\Request\Transaction\CreateTransactionRequest;

$transactionRequest = new CreateTransactionRequest($token, $service, $redirectUrl);
$transaction = $client->handle($transactionRequest);

echo $transaction->getAuthenticationUrl();
```

Retrieve status after validation of itsme:
```php
<?php

use Nascom\ItsmeApiClient\Request\Status\RetrieveStatusRequest;

$statusRequest = new RetrieveStatusRequest($_SESSION['token']);
$status = $client->handle($statusRequest);

echo $status->getEmailAddress();
```
