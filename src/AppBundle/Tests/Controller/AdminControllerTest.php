<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Tests\Util\AuthenticatedClient;
class AdminControllerTest extends WebTestCase
{
    private $client = null;
    private $container = null;
    public function setUp()
    {
        $this->client = AuthenticatedClient::login();
        $this->container = static::$kernel->getContainer();
    }

    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/admin');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertNotNull($crawler->filter('h1')->text());
    }
}
