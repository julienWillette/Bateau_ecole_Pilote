<?php

namespace App\Tests\Routes;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RoutesTest extends WebTestCase
{
    /**
    * @dataProvider urlProvider
    */
    public function testAllRouteSuccessful($url) 
    {
        $client = self::createClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return [
            ['/'],
            ['/blog'],
            ['//me-contacter'],
            ['/faq'],
            ['/permis'],
            ['/profile/{id}'],
            ['/creation-de-compte'],
            ['/creation-de-compte'],
            ['/connexion'],
            ['/logout'],
            ['/admin']
        ];
    }
}