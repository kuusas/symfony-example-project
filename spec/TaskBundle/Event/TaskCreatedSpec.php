<?php

namespace spec\TaskBundle\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TaskBundle\Entity\Task;

class TaskCreatedSpec extends ObjectBehavior
{
    function let(Task $task)
    {
        $this->beConstructedWith($task);
    }

    function it_is_event()
    {
        $this->shouldBeAnInstanceOf('Symfony\Component\EventDispatcher\Event');
    }

    function it_contains_task($task)
    {
        $this->getTask()->shouldReturn($task);
    }
}
