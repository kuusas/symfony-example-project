<?php

namespace TaskBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/task/');

        $this->assertContains('Tasks', $client->getResponse()->getContent());
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/task/new');

        $this->assertContains('task_name', $client->getResponse()->getContent());
    }
}
