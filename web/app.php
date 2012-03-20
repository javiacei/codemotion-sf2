<?php

require_once __DIR__ . '/../app/autoload.php';

use Codemotion\Controller\TaskController;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$request = Request::createFromGlobals();

/* Controlador de tareas */
$controller = new TaskController();

/* Recogemos los datos */
switch ($request->get('action', 'list')) {
    case 'list':
        $response = $controller->listAction($request);
        break;
    case 'show':
        $response = $controller->showAction($request);
        break;
}

/* Enviamos el contenido */
$response->prepare($request);
$response->send();
