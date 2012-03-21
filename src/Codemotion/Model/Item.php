<?php

namespace Codemotion\Model;

/**
 * @Entity @Table(name="item")
 **/
class Item
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @ManyToOne(targetEntity="Task", inversedBy="items")
     * @JoinColumn(name="task_id", referencedColumnName="id")
     */
    protected $task;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set task
     *
     * @param Codemotion\Model\Task $task
     * @return Item
     */
    public function setTask(\Codemotion\Model\Task $task = null)
    {
        $this->task = $task;
        return $this;
    }

    /**
     * Get task
     *
     * @return Codemotion\Model\Task 
     */
    public function getTask()
    {
        return $this->task;
    }
}