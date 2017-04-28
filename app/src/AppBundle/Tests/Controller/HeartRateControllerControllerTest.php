<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HeartRateControllerControllerTest extends WebTestCase
{
    public function testIndex ()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/heartrate/index');
    }

    public function testAdd ()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/heartrate/create');
    }

}
