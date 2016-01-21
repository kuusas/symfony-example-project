<?php

namespace spec\TaskBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TaskBundle\Entity\Category;
use TaskBundle\Entity\Task;

class AssignCategoryToTaskSpec extends ObjectBehavior
{
    function let(Category $category, Task $task)
    {
        $this->beConstructedWith($category, $task);
    }

    function it_contains_task($task)
    {
        $this->getTask()->shouldReturn($task);
    }

    function it_contains_category($category)
    {
        $this->getCategory()->shouldReturn($category);
    }
}
