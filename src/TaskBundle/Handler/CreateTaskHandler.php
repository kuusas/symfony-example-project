<?php

namespace TaskBundle\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use TaskBundle\Command\CreateTask;
use TaskBundle\Event\TaskCreated;

class CreateTaskHandler
{
    private $em;
    private $dispatcher;

    public function __construct(
        EntityManagerInterface $em,
        EventDispatcherInterface $dispatcher
    ) {
        $this->em = $em;
        $this->dispatcher = $dispatcher;
    }

    public function handle(CreateTask $command)
    {
        $task = $command->getTask();
        $task->setCreated(new \DateTime());

        $this->em->persist($task);

        $event = new TaskCreated($task);
        $this->dispatcher->dispatch($event::NAME, $event);
        $this->em->flush();
    }
}
