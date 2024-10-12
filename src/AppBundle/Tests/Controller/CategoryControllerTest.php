<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Tests\Util\AuthenticatedClient;

class CategoryControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp()
    {
        $this->client = AuthenticatedClient::login();
    }

    public function testCompleteScenario()
    {
        $crawler = $this->client->request('GET', '/cms/category/');
        $this->assertEquals(200,
            $this->client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET /cms/category/");
        $crawler = $this->client->click($crawler->selectLink('Create a new entry')->link());
        $form = $crawler->selectButton('Create')->form(array(
            'appbundle_category[name]'  => 'Test',
        ));

        $this->client->submit($form);
        $crawler = $this->client->followRedirect();
        $this->assertGreaterThan(0,
            $crawler->filter('td:contains("Test")')->count(),
            'Missing element td:contains("Test")');
        $crawler = $this->client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'appbundle_category[name]'  => 'Foo',
        ));

        $this->client->submit($form);
        $crawler = $this->client->followRedirect();
        $this->assertGreaterThan(0,
            $crawler->filter('[value="Foo"]')->count(),
            'Missing element [value="Foo"]');

        $this->client->submit($crawler->selectButton('Delete')->form());

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $this->client->getResponse()->getContent());
    }
}
