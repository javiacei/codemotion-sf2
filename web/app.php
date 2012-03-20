<?php

require_once __DIR__ . '/../src/Codemotion/Model/TaskManager.php';
require_once __DIR__ . '/../src/Codemotion/Model/Task.php';

$taskManager = new \Codemotion\Model\TaskManager();
$tasks = $taskManager->getAll();

/* Enviamos la cabecera HTTP con estado OK (200) */
header('HTTP 1.0 200 OK');
header('Content-Type: text/html UTF-8');
$now = new \DateTime();
header(sprintf('date: /%s ', $now->format("Y-m-d H:i:s")));

/* Enviamos el contenido HTTP */
include __DIR__ . '/../src/Codemotion/View/Task/list.php';
