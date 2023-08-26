<?php

namespace App\DataFixtures;

use App\Factory\BoxFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
		BoxFactory::createMany(40);
    }
}
