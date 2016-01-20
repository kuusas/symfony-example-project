<?php

namespace spec\TaskBundle\Handler;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TaskBundle\Command\DeleteTask;

class DeleteTaskHandlerSpec extends ObjectBehavior
{
    function it_handles_command(DeleteTask $command)
    {
        $this->handle($command);
    }
}
