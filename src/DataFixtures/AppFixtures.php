<?php 

namespace App\DataFixtures;

use App\Entity\CoolStuff;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
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