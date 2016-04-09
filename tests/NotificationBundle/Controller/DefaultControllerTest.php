<?php

namespace Tests\NotificationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/notification/');

        $this->assertContains('Hello World', $client->getResponse()->getContent());
    }
}
