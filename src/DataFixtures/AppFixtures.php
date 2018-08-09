<?php 

namespace App\DataFixtures;

use App\Entity\CoolStuff;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * AppFixtures
 *
 * Adds 10 CoolStuff objects to DB.
 */
class AppFixtures extends Fixture
{
    /**
     * load Fixtures
     *
     * @param ObjectManager $manager 
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        // create 10 CoolStuff's
        for ($i = 0; $i < 10; $i++) {
            $coolStuff = new CoolStuff();
            $coolStuff->setName('Cool - ' . $i);
            $coolStuff->setCool((bool)random_int(0, 1));
            $manager->persist($coolStuff);
        }

        $manager->flush();
    }
}