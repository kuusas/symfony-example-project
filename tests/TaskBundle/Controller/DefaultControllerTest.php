<?php

namespace TaskBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/task/');

        $this->assertContains('Hello World', $client->getResponse()->getContent());
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/task/new');

        dump($client->getResponse()->getContent());
    }
}
