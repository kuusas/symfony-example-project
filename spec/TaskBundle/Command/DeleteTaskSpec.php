<?php

namespace spec\TaskBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteTaskSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('TaskBundle\Command\DeleteTask');
    }
}
