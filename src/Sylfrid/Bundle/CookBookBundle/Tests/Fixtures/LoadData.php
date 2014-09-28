<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 28/09/14
 * Time: 16:22
 */

namespace Sylfrid\Bundle\CookBookBundle\Tests\Fixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sylfrid\Bundle\CookBookBundle\Entity\CookBook;

class LoadData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $cookbook = new CookBook();
        $cookbook->setName('Livre de recettes');

        $manager->persist($cookbook);
        $manager->flush();
    }

} 