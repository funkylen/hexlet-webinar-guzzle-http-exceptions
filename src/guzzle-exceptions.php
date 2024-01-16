<?php

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

function getClient()
{
    $baseUri = 'http://127.0.0.1:8000';
    return new Client(['base_uri' => $baseUri, 'timeout' => 5]);
}

function getSuccessResponse()
{
    return getClient()->get('/success');
}

function getClientErrorResponse()
{
    return getClient()->get('/client-error');
}

function getServerErrorResponse()
{
    return getClient()->get('/server-error');
}

function getServerError2Response()
{
    return getClient()->get('/server-error-v2');
}

function getRedirectCommonResponse()
{
    return getClient()->get('/redirect');
}

function getRedirectResponse()
{
    return getClient()->get('/redirect', [
        'allow_redirects' => false,
    ]);
}

function getManyRedirectResponse()
{
    return getClient()->get('/many-redirect');
}

function getNotFoundResponse()
{
    return getClient()->get('/');
}

function getConnectResponse()
{
    return getClient()->get('/connect');
}
