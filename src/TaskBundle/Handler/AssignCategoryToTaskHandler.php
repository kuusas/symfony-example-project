<?php

namespace TaskBundle\Handler;

use Doctrine\ORM\EntityManagerInterface;
use TaskBundle\Command\AssignCategoryToTask;

class AssignCategoryToTaskHandler
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function handle(AssignCategoryToTask $command)
    {
        $task = $command->getTask();
        $category = $command->getCategory();

        $task->addCategory($category);
        $this->em->persist($task);

        $this->em->flush();
    }
}
