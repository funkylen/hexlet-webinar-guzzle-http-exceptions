<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/success', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/server-error', function (Request $request, Response $response) {
    throw new \Exception('Error!');
});

$app->get('/client-error', function (Request $request, Response $response) {
    return $response->withStatus(422);
});

$app->redirect('/redirect', '/success', 301);

$app->redirect('/many-redirect', '/many-redirect', 301);

$app->get('/server-error-v2', function (Request $request, Response $response) {
    return $response->withStatus(502);
});

$app->get('/connect', function (Request $req, Response $res) {
    sleep(100);
});

$app->run();
