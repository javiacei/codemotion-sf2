<?php

namespace Codemotion\Model;

class TaskManager
{
    const STATE_TODO     = 'todo';
    const STATE_WORKING  = 'working';
    const STATE_COMPLETE = 'complete';

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
}
