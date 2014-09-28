<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 28/09/14
 * Time: 15:39
 */

namespace Sylfrid\Bundle\CookBookBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class CookBookController
 * @package Sylfrid\Bundle\CookBookBundle\Tests\Controller
 */
class CookBookController extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function setUp()
    {
        $fixtures = array(
            'Sylfrid\Bundle\CookBookBundle\Tests\Fixtures\LoadData'
        );

        $this->loadFixtures($fixtures);

        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->entityManager = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
    }

    public function testShowActionIsAvailable()
    {
        $cookbook = $this->entityManager->getRepository('SylfridCookBookBundle:CookBook')->findOneBy(array());

        $client = self::createClient();
        $crawler = $client->request('GET', '/cookbook/' . $cookbook->getId());

        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode(),
            "@SylfridCookBook:CookBook:showAction return a 404 status code."
        );

        $this->assertGreaterThan(
            0,
            $crawler->filter(
                'html:contains("Livre de recettes")'
            )->count(),
            '@SylfridCookBook:CookBook:showAction doesn\'t return a valid entity.'
        );
    }
}