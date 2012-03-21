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
}
