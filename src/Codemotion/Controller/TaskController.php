<?php

namespace Codemotion\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Codemotion\Model\TaskManager;

class TaskController
{
    protected function renderView($template, array $vars = array())
    {
        ob_start();
        include __DIR__ . '/../View/Task/' . $template . '.php';
        $content = ob_get_clean();

        return new Response($content);
    }

    public function listAction(Request $request)
    {
        $taskManager = new TaskManager();

        if ($name = $request->get('name')) {
            $this->tasks = $taskManager->getByName($name);
        } else {
            $this->tasks = $taskManager->getAll();
        }

        return $this->renderView('list');
    }

    public function showAction(Request $request)
    {
        $taskManager = new TaskManager();
        $this->task = $taskManager->getOneByName($request->get('name'));

        return $this->renderView('show');
    }
}
