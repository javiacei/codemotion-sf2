<?php

require_once __DIR__ . '/../app/autoload.php';

use Codemotion\Model\TaskManager;
use Codemotion\Controller\TaskController;

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$taskManager = new TaskManager();

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
