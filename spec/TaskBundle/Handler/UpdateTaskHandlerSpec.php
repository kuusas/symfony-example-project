<?php

namespace spec\TaskBundle\Handler;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TaskBundle\Command\UpdateTask;

class UpdateTaskHandlerSpec extends ObjectBehavior
{
    function it_handles_command(UpdateTask $command)
    {
        $this->handle($command);
    }
}
