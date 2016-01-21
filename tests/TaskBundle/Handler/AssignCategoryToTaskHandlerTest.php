<?php

namespace TaskBundle\Tests\Handler;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AssignCategoryToTaskHandlerTest extends WebTestCase
{
    public function testContainerDefinition()
    {
        $this->assertInstanceOf(
            'TaskBundle\Handler\AssignCategoryToTaskHandler',
            static::createClient()->getContainer()->get('assign_category_to_task.command_handler')
        );
    }
}