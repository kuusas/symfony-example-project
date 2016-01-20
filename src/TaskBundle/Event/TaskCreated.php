<?php

namespace TaskBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use TaskBundle\Entity\Task;

class TaskCreated extends Event
{
    const NAME = 'task_created';

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
