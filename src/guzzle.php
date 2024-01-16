<?php

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

$url = 'https://dummy.restapiexample.com/api/v1/employees';

$client = new Client();
$response = $client->get($url);

var_dump($response->getStatusCode());
print_r((string) $response->getBody());
