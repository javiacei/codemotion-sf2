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

    public function updateTask(Task $task, $andFlush = true)
    {
        $this->em->persist($task);
        if (true === $andFlush) {
            $this->em->flush();
        }
    }

    public function deleteTask(Task $task)
    {
        $this->em->remove($task);
        $this->em->flush();
    }

    /**
     * @return \Doctrine\Common\Collection\ArrayCollection
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @return \Doctrine\Common\Collection\ArrayCollection
     */
    public function getByName($name, $like = true)
    {
        if (false === $like) {
            return $this->repository->findByName($name);
        }

        return $this->em
            ->createQuery("SELECT t FROM {$this->class} t WHERE t.name LIKE :name")
            ->setParameter('name', "%$name%")
            ->getResult();
    }

    /**
     * @return Codemotion\Model\Task (Proxy)
     */
    public function getOneByName($name)
    {
        return $this->repository->findOneByName($name);
    }
}
