<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Service\Slug;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodesFixtures extends Fixture implements DependentFixtureInterface
{
    public Slug $slug;

    public function __construct(Slug $slug)
    {
        $this->slug = $slug;
    }

    public function load(ObjectManager $manager): void
    {
            $episode = new Episode();
            $episode->setTitle('Un nouveau départ');
            $episode->setSlugi($this->slug->generate($episode->getTitle()));
            $episode->setSynopsis("Dix-huit mois après la fin de la guerre contre les Sauveurs, une paix fragile règne sur les différentes communautés de survivants. Afin de reconstruire une civilisation telle qu’imaginée par son fils Carl, Rick et son groupe entament une expédition risquée jusqu’à Washington pour récupérer du matériel agricole.");
            $episode->setNumber(9);
            $episode->setSeason($this->getReference('season1'));
            $manager->persist($episode);
            $manager->flush();


            $episode2 = new Episode();
            $episode2->setTitle("Le dernier chic type de New York");
            $episode2->setSlugi($this->slug->generate($episode2->getTitle()));
            $episode2->setSynopsis("Beck et Joe ont un vrai rendez-vous. Joe fait tout ce qui est en son pouvoir pour convaincre Beck, mais elle pense toujours à son ex, Benji, qui n'est pas bon pour elle.");
            $episode2->setNumber(1);
            $episode2->setSeason($this->getReference('season2'));
            $manager->persist($episode2);
            $manager->flush();
    }
    public function getDependencies()
    {
       return [
           SeasonFixtures::class
       ];
    }
}
