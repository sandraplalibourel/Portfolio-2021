<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologiesFixtures extends Fixture
{
    public const TECHNOS = [
        [
            'name' => 'HTML'
        ],
        [
            'name' => 'CSS'
        ],
        [
            'name' => 'PHP'
        ],
        [
            'name' => 'SQL'
        ],
        [
            'name' => 'JAVASCRIPT'
        ],
        [
            'name' => 'SYMFONY'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::TECHNOS as $technoData) {
            $technology = new Technology();
            $technology->setName($technoData['name']);

            $manager->persist($technology);
        }

        $manager->flush();
    }
}
