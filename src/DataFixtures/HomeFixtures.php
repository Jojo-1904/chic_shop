<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitre('Bienvenue sur le site de Chic Shop');
        $home->setTexte('Decouvrez nos collections');
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre('Bienvenue sur le site de Chic Shop');
        $home->setTexte("C'est les soldes ! Decouvrez nos promotions");
        $home->setIsActive(false);
        $manager->persist($home);

        $manager->flush();
    }
}
