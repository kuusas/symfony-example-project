<?php

namespace spec\TaskBundle\Handler;

use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TaskBundle\Command\AssignCategoryToTask;
use TaskBundle\Entity\Category;
use TaskBundle\Entity\Task;

class AssignCategoryToTaskHandlerSpec extends ObjectBehavior
{
    function let(
        EntityManagerInterface $em
    ) {
        $this->beConstructedWith($em);
    }

    function it_assigns_category_to_task(
        AssignCategoryToTask $command,
        Task $task,
        Category $category,
        $em
    ) {
        $command->getCategory()->willReturn($category);
        $command->getTask()->willReturn($task);

        $task->addCategory($category)->shouldBeCalled($category);

        $em->persist($task)->shouldBeCalled();
        $em->flush()->shouldBeCalled();

        $this->handle($command);
    }
}
