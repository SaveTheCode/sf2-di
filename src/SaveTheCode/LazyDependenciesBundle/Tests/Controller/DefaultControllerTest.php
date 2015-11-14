<?php

namespace SaveTheCode\LazyDependenciesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 * @package SaveTheCode\LazyDependenciesBundle\Tests\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    /** @var  Client */
    private static $client;

    public function setUp()
    {
        static::$client = static::createClient();
    }

    /**
     * test data provider
     *
     * @return array
     */
    public function getRoutes()
    {
        return [
            'lazy dependency not called' => ['/lazy-dependencies/lazy/do-something'],
            'lazy dependency called' => ['/lazy-dependencies/lazy/do-something-with-dependency'],
            'not lazy dependency not called' => ['/lazy-dependencies/not-lazy/do-something'],
            'not lazy dependency called' => ['/lazy-dependencies/not-lazy/do-something-with-dependency'],
        ];
    }

    /**
     * @dataProvider getRoutes
     *
     * @param $route
     */
    public function testStatus($route)
    {
        static::$client->request('GET', $route);
        $this->profiling();
        $this->assertEquals(200, static::$client->getResponse()->getStatusCode(), 'Checking HTTP_STATUS');
    }

    public function testUndefinedRoute()
    {
        static::$client->request('GET', '/this-route-does-not-exist');
        $this->assertEquals(404, static::$client->getResponse()->getStatusCode(), 'You must be kidding!');
    }

    /**
     * Print profiling report
     */
    private function profiling()
    {
        if ($profile = static::$client->getProfile()) {
            printf(
                "%s\ntime: %d\nmemory: %d\n\n",
                static::$client->getInternalRequest()->getUri(),
                $profile->getCollector('time')->getDuration(),
                $profile->getCollector('memory')->getMemory()
            );
        }
    }
}
