<?php

namespace spec\TaskBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UpdateTaskSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('TaskBundle\Command\UpdateTask');
    }
}
