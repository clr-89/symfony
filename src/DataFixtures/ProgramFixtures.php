<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ProgramFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $program =new Program();
        $program->setTitle("Walking Dead");
        $program->setSummary("Des Zombies envahissent la terre");
        $program->setCategory($this->getReference('category_1'));
        for ($i=0; $i < count(ActorFixtures::ACTORS); $i++) {
            $program->addActor($this->getReference('actor_' . $i));
        }
        $manager->persist($program);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
