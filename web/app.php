<?php

require_once __DIR__ . '/../app/autoload.php';

use Codemotion\Model\TaskManager;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// Recogemos los datos
$taskManager = new TaskManager();

if ($name = $request->get('name')) {
    $tasks = $taskManager->getByName($name);
} else {
    $tasks = $taskManager->getAll();
}

/* Utilizamos Output Buffering para no enviar el contenido de la vista y lo recogemos
 * en la variable $content
 */
ob_start();
include __DIR__ . '/../src/Codemotion/View/Task/list.php';
$content = ob_get_clean();

/* Enviamos la cabecera HTTP con estado OK (200) más los datos */
$response = new Response($content);
$response->prepare($request);
$response->send();
