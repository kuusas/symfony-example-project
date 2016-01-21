<?php

namespace Smoke;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TasksTest extends WebTestCase
{
    public function testListing()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', HOST . '/task/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}
