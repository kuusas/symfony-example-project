<?php

namespace Smoke;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', HOST . '');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome!', $client->getResponse()->getContent());
    }
}
