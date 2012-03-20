<?php

require_once __DIR__ . '/../app/autoload.php';

use Codemotion\Model\TaskManager;

use Symfony\Component\HttpFoundation\Request;

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

/* Enviamos la cabecera HTTP con estado OK (200) */
header('HTTP 1.0 200 OK');
header('Content-Type: text/html UTF-8');
$now = new \DateTime();
header(sprintf('date: /%s ', $now->format("Y-m-d H:i:s")));

echo $content;
