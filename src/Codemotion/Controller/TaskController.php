<?php

namespace Codemotion\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Doctrine\ORM\EntityManager;

use Codemotion\Model\TaskManager;
use Codemotion\Model\Item;

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

    public function deleteAction(Request $request)
    {
        $taskManager = new TaskManager($this->getEntityManager());
        $task = $taskManager->getOneByName($request->get('name'));

        $taskManager->deleteTask($task);

        return new RedirectResponse('/app.php/task/list');
    }

    public function createAction(Request $request)
    {
        $taskManager = new TaskManager($this->getEntityManager());

        $task = $taskManager->createTask('Tarea ' . uniqid(), "Descripción ...");

        /*  Asociación de items */
        $randomItems = array(
            'Subtarea ' . uniqid(),
            'Subtarea ' . uniqid(),
            'Subtarea ' . uniqid()
        );

        foreach ($randomItems as $itemName) {
            // Cascade = "all" --> Los items se guardarán cuando se guarda la tarea.
            $item = new Item();
            $item->setName($itemName);

            /* Relacción bidireccional */
            $item->setTask($task);
            $task->addItem($item);
        }

        $taskManager->updateTask($task);

        return new RedirectResponse('/app.php/task/list');
    }
}
