<?php

require_once __DIR__ . '/../app/bootstrap.php';

/* REQUEST */
$request = $container->get('request');

/* URL */
$router = $container->get('routing');
$parameters = $router->match($request->getPathInfo());

/* CONTROLLER */
$controller = new $parameters['controller'];
$action     = $parameters['action'];

/* Dependencias del controlador */
$controller->setContainer($container);

/* Introducimos los parametros de la ruta en los atributos del objeto request */
$request->attributes->add($parameters);

/* RESPONSE */
$response = $controller->$action($request);
$response->prepare($request);
$response->send();
