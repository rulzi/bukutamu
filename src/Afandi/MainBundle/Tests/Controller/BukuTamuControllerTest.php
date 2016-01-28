<?php

namespace Afandi\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BukuTamuControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/bukutamu');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/bukutamu/add');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/bukutamu/edit/{id}');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/bukutamu/delete');
    }

}
