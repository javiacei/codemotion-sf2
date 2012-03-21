<?php

namespace Codemotion\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\ORM\EntityManager;

use Codemotion\Model\TaskManager;

class TaskController
{
    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    protected function renderView($template, array $vars = array())
    {
        ob_start();
        include __DIR__ . '/../View/Task/' . $template . '.php';
        $content = ob_get_clean();

        return new Response($content);
    }

    public function listAction(Request $request)
    {
        $taskManager = new TaskManager($this->getEntityManager());

        if ($name = $request->get('name')) {
            $this->tasks = $taskManager->getByName($name);
        } else {
            $this->tasks = $taskManager->getAll();
        }

        return $this->renderView('list');
    }

    public function showAction(Request $request)
    {
        $taskManager = new TaskManager($this->getEntityManager());
        $this->task = $taskManager->getOneByName($request->get('name'));

        return $this->renderView('show');
    }
}
