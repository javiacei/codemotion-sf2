<?php

namespace Codemotion\Model;

use Doctrine\ORM\EntityManager;

class TaskManager
{
    const STATE_TODO     = 'todo';
    const STATE_WORKING  = 'working';
    const STATE_COMPLETE = 'complete';

    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->class = 'Codemotion\Model\Task';
        $this->repository = $em->getRepository($this->class);
    }

    public function createTask($name)
    {
        $task = new Task();
        $task->setName($name);
        $task->setState(self::STATE_TODO);

        return $task;
    }

    public function getAll()
    {
        $tasks = array();
        $taskNumber = 10;

        for ($i = 1; $i <= $taskNumber; $i++) {
            $tasks[] = $this->createTask('Tarea ' . $i);
        }

        return $tasks;
    }

    public function getByName($name, $like = true)
    {
        $tasks = $this->getAll();

        $checkByName = function ($task) use ($name, $like) {
            if (true === $like) {
                return false !== strpos($task->getName(), $name);
            }

            return $name === $task->getName();
        };

        return array_filter($tasks, $checkByName);
    }

    public function getOneByName($name)
    {
        $tasks = $this->getByName($name, false);
        return array_pop($tasks);
    }
}
