<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sample of a CoolStuff Controller test
 *
 */
class CoolStuffControllerTest extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client;
    
    /**
     * Set up test.
     *
     * @return void
     */
    public function setUp()
    {
        $this->client = static::createClient([], [
            'PHP_AUTH_USER' => 'usertest1',
            'PHP_AUTH_PW'   => 'passtest1',
        ]);
        
    }
    
    /**
     * test Show list action
     *
     * @return void
     */
    public function testShowCoolStuff() : void
    {
        // do request and get crawler
        $crawler = $this->client->request('GET', '/cool/stuff/');

        // assert Response - status code
        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        
        // assert Response - content present
        $this->assertNotEmpty($this->client->getResponse()->getContent());
        
        // assert HTML if title exists
        $this->assertEquals(
            1,
            $crawler->filter('html:contains("CoolStuff index")')->count()
        );
        
        // assert there are 'show' items
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("show")')->count()
        );
        
        // assert there are 'edit' items
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("edit")')->count()
        );        
        
        // get a show link
        $link = $crawler
            ->filter('a:contains("show")')
            ->eq(1)
            ->link()
        ;

        // click
        $crawler = $this->client->click($link);
        
        // assert new title on new page
        $this->assertEquals(
            1,
            $crawler->filter('html:contains("CoolStuff")')->count()
        );
        
        // assert if new page contains back to list
        $this->assertEquals(
            1,
            $crawler->filter('html:contains("back to list")')->count()
        );        
        
    }
    
    /**
     * test New action
     *
     * @return void
     */
    public function testNewCoolStuff() : void
    {
        // do request and get crawler
        $crawler = $this->client->request('GET', '/cool/stuff/new');

        // assert Response - status code
        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        
        $form = $crawler->selectButton('Save')->form();
        $form['cool_stuff[name]'] = 'TEST';
        $form['cool_stuff[cool]'] = 1;        
        
        $crawler = $this->client->submit($form);
        
        $this->assertTrue($this->client->getResponse()->isRedirect());
        $this->client->followRedirect();
        
        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
    }
}
