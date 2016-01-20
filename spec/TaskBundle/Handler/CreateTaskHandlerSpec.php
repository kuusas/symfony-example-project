<?php

namespace spec\TaskBundle\Handler;

use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use TaskBundle\Command\CreateTask;
use TaskBundle\Entity\Task;
use TaskBundle\Event\TaskCreated;

class CreateTaskHandlerSpec extends ObjectBehavior
{
    function let(
        EntityManagerInterface $em,
        EventDispatcherInterface $dispatcher
    ) {
        $this->beConstructedWith($em, $dispatcher);
    }

    function it_persists_task_and_dispatches_event(
        CreateTask $command,
        Task $task,
        $em,
        $dispatcher
    ) {
        $task->setCreated(Argument::any())->shouldBeCalled();
        $command->getTask()->willReturn($task);
        $em->persist($task)->shouldBeCalled();
        $em->flush()->shouldBeCalled();

        $dispatcher
            ->dispatch(TaskCreated::NAME, Argument::type('TaskBundle\Event\TaskCreated'))
            ->shouldBeCalled();

        $this->handle($command);
    }
}
