<?php

require_once __DIR__ . '/../app/bootstrap.php';

$request = $container->get('request');

$router = $container->get('routing');
$parameters = $router->match($request->getPathInfo());

$controller = new $parameters['controller'];
$action     = $parameters['action'];

/* Dependencias del controlador */
$controller->setEntityManager($container->get('doctrine.entity_manager'));
$controller->setTemplating($container->get('twig'));
$controller->setRouting($router);

/* Introducimos los parametros de la ruta en los atributos del objeto request */
$request->attributes->add($parameters);

$response = $controller->$action($request);

/* Enviamos el contenido */
$response->prepare($request);
$response->send();
