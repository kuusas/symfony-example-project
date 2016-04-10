<?php

namespace TaskBundle\Command;

use TaskBundle\Entity\Task;

class UpdateTask
{
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getTask()
    {
        return $this->task;
    }
}
