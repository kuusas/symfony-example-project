<?php

namespace Tests\TaskBundle\Tests\Handler;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreateTaskHandlerTest extends WebTestCase
{
    public function testContainerDefinition()
    {
        $this->assertInstanceOf(
            'TaskBundle\Handler\CreateTaskHandler',
            static::createClient()->getContainer()->get('create_task.command_handler')
        );
    }
}