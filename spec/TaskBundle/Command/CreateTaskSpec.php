<?php

namespace spec\TaskBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TaskBundle\Entity\Task;

class CreateTaskSpec extends ObjectBehavior
{
    function let(Task $task)
    {
        $this->beConstructedWith($task);
    }

    function it_contains_task($task)
    {
        $this->getTask()->shouldReturn($task);
    }
}
