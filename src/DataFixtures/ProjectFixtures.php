<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Project;

class ProjectFixtures extends Fixture
{
    public const PROJECTS = [
        [
            'name' => 'Projet 1',
            'year' => '2020',
            'description' => 'description projet 1',
            'technologies' => '1',
        ],
        [
            'name' => 'Projet 2',
            'year' => '2020',
            'description' => 'description projet 2',
            'technologies' => '1',
        ],
        [
            'name' => 'Projet 3',
            'year' => '2021',
            'description' => 'description projet 3',
            'technologies' => '1',
        ]
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROJECTS as $projectData) {
            $project = new Project();
            $project->setName($projectData['name']);
            $project->setYear($projectData['year']);
            $project->setDescription($projectData['description']);

            $manager->persist($project);
        }
        $manager->flush();
    }
}
