<?php

require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../app/database.php';

use Codemotion\Controller\TaskController;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Router;

use Symfony\Component\Config\FileLocator;

$request = $container->get('request');

$router = $container->get('routing');
$parameters = $router->match($request->getPathInfo());

$controller = new $parameters['controller'];
$action     = $parameters['action'];

/* Dependencias del controlador */
$controller->setEntityManager($em);
$controller->setTemplating($container->get('twig'));
$controller->setRouting($router);

/* Introducimos los parametros de la ruta en los atributos del objeto request */
$request->attributes->add($parameters);

$response = $controller->$action($request);

/* Enviamos el contenido */
$response->prepare($request);
$response->send();
