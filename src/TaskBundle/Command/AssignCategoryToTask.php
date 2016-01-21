<?php

namespace TaskBundle\Command;

use TaskBundle\Entity\Category;
use TaskBundle\Entity\Task;

class AssignCategoryToTask
{
    private $category;
    private $task;
    
    public function __construct(Category $category, Task $task)
    {
        $this->category = $category;
        $this->task = $task;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function getCategory()
    {
        return $this->category;
    }
}
