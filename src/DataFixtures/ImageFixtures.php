<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $image = new Image();
        $image->setImageName('costume-croise-a-carreaux.webp');
        $image->setCostume($this->getReference(CostumeFixtures::COSTUME_CROISE_A_CARREAUX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('costume-croise-a-rayures.webp');
        $image->setCostume($this->getReference(CostumeFixtures::COSTUME_CROISE_A_RAYURES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('costume-croise-prince-de-galles.webp');
        $image->setCostume($this->getReference(CostumeFixtures::COSTUME_CROISE_PRINCE_DE_GALLES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('costume-trois-pieces-anthracite-a-rayure-tennis.webp');
        $image->setCostume($this->getReference(CostumeFixtures::COSTUME_TROIS_PIECES_ANTHRACITE_A_RAYURES_TENNIS));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('costume-trois-pieces-caviar.webp');
        $image->setCostume($this->getReference(CostumeFixtures::COSTUME_TROIS_PIECES_CAVIAR));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('costume-trois-pieces-faux-uni.webp');
        $image->setCostume($this->getReference(CostumeFixtures::COSTUME_TROIS_PIECES_FAUX_UNI));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('smoking-croise-Anglais-faux-uni.webp');
        $image->setCostume($this->getReference(CostumeFixtures::COSTUME_CROISE_ANGLAIS_FAUX_UNI));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('smoking-trois-pieces-a-large-revers.webp');
        $image->setCostume($this->getReference(CostumeFixtures::COSTUME_TROIS_PIECES_A_LARGE_REVERS));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('smoking-trois-pieces-col-chales.webp');
        $image->setCostume($this->getReference(CostumeFixtures::SMOKING_TROIS_PIECES_COL_CHLALES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $manager->flush();
    }
    
}
