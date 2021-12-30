<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Service\Slug;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\String\Slugger\SluggerInterface;


class ProgramFixtures extends Fixture implements DependentFixtureInterface
{

    public Slug $slug;

    public function __construct(Slug $slug)
    {
        $this->slug = $slug;
    }

    public function load(ObjectManager $manager): void
    {
        $program =new Program();
        $program->setTitle("Walking Dead");
        $program->setSlugi($this->slug->generate($program->getTitle()));
        $program->setSummary("Des Zombies envahissent la terre");
        $program->setCategory($this->getReference('category_4'));
        for ($i=0; $i < count(ActorFixtures::ACTORS); $i++) {
            $program->addActor($this->getReference('actor_' . $i));
            $manager->persist($program);
        }
        $this->addReference('program1', $program);
        $manager->flush();

        $program2 =new Program();
        $program2->setTitle("Vampire Diaries");
        $program2->setSlugi($this->slug->generate($program2->getTitle()));
        $program2->setSummary("Quatre mois après le tragique accident de voiture qui a tué leurs parents, Elena Gilbert, 17 ans, et son frère Jeremy, 15 ans, essaient encore de s'adapter à cette nouvelle réalité. Belle et populaire, l'adolescente poursuit ses études au Mystic Falls High en s'efforçant de masquer son chagrin. Elena est immédiatement fascinée par Stefan et Damon Salvatore, deux frères que tout oppose. Elle ne tarde pas à découvrir qu'ils sont en fait des vampires...");
        $program2->setCategory($this->getReference('category_4'));
        for ($i=0; $i < count(ActorFixtures::ACTORS); $i++) {
            $program2->addActor($this->getReference('actor_' . $i));
            $manager->persist($program2);
        }
        $this->addReference('program2', $program2);
        $manager->flush();

        $program3 =new Program();
        $program3->setTitle("Grey's Anatomy");
        $program3->setSlugi($this->slug->generate($program3->getTitle()));
        $program3->setSummary("Meredith Grey, fille d'un chirurgien très réputé, commence son internat de première année en médecine chirurgicale dans un hôpital de Seattle. La jeune femme s'efforce de maintenir de bonnes relations avec ses camarades internes, mais dans ce métier difficile la compétition fait rage...");
        $program3->setCategory($this->getReference('category_2'));
        for ($i=0; $i < count(ActorFixtures::ACTORS); $i++) {
            $program3->addActor($this->getReference('actor_' . $i));
            $manager->persist($program3);
        }
        $this->addReference('program3', $program3);
        $manager->flush();

        $program4 =new Program();
        $program4->setTitle("You");
        $program4->setSlugi($this->slug->generate($program4->getTitle()));
        $program4->setSummary("Joe, le gérant d'une librairie new-yorkaise, devient obsédé par Beck, une jeune aspirante écrivaine qui partage sa passion pour les livres et pour la poésie. Persuadé qu'ils sont faits l'un pour l'autre, il va alors se servir des réseaux sociaux pour nourrir son obsession, savoir en permanence où elle se trouve et ce qu'elle fait, et tenter de faire tomber tous les obstacles qui pourraient se dresser en travers du chemin de leur possible romance. Quitte à commettre des actes totalement fous...");
        $program4->setCategory($this->getReference('category_4'));
        for ($i=0; $i < count(ActorFixtures::ACTORS); $i++) {
            $program4->addActor($this->getReference('actor_' . $i));
            $manager->persist($program4);
        }
        $this->addReference('program4', $program4);
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
