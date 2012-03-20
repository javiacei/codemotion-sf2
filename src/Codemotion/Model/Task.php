<?php

namespace Codemotion\Model;

class Task
{
    protected $name;
    protected $state;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setHours($hours)
    {
        $this->hours = $hours;
    }
}
