<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $season = new Season();
        $season->setDescription("Season 1 You");
        for ($i = 0; $i < 10; $i++) {
            $season->setNumber($i);
            $season->setYear(2018 + $i);
            $season->setProgram($this->getReference('program3'));
            $manager->persist($season);
        }
        $this->addReference('season1', $season);
        $manager->flush();

        $season2 = new Season();
        $season2->setDescription("Season 9 Walking Dead");
        for ($i = 0; $i < 10; $i++) {
            $season2->setNumber($i);
            $season2->setYear(2020 + $i);
            $season2->setProgram($this->getReference('program1'));
            $manager->persist($season2);
        }
        $this->addReference('season2', $season2);
        $manager->flush();


        $manager->flush();
    }
    public function getDependencies()
    {
        return  [
            ProgramFixtures::class
        ];
    }
}
