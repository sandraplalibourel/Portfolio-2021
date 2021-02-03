<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Project;

class ProjectFixtures extends Fixture
{
    public const PROJECTS = [
        [
            'name' => 'Site statique',
            'year' => '2020',
            'description' => 'Réalisation d\'un site fictif & statique pour un commerce',
            'technologies' => 'HTML & CSS',
        ],
        [
            'name' => 'Techwatch - Gestionnaire de veilles technologiques',
            'year' => '2020',
            'description' => 'Réalisation d\'un site de partage de veilles technologiques',
            'technologies' => 'PHP, HTML, CSS, SQL ',
        ],
        [
            'name' => 'Authentic-Trip - Créateur de carnets de voyage sur mesure',
            'year' => '2021',
            'description' => 'Réalisation d\'une application web (front & back) pour la création de carnets de voyages personnalisés',
            'technologies' => 'PHP, Symfony, HTML, CSS, SQL',
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
