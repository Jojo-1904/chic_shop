<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixtures extends Fixture
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const COSTUME_CROISE = "costume croisé";
    public const SMOKING = "smoking";
    public const COSTUME_TROIS_PIECES = "costume trois pièces";

    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $categorie = new Categorie();
        $categorie->setNom("Costume croisé");
        $categorie->setSlug("costume-croise");
        $categorie->setDescription("Du costume tendance classique, au costume dandy chic,
        Chic Shop présente une sélection de costumes pour homme, tous réalisés à en tissu Super 150 de haute qualité.
        Choisissez un costume croisé trois pièces pour un look chic et décontracté, 
        ou un smoking pour une élégance raffinée. Costume bleu ou gris anthracite pour 
        les réunions ou une veste de costume noire avec un nœud papillon en velours pour 
        les grandes occasions. Le choix est vôtre.");
        $categorie->setImageName("costume-croise.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->setIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        // On crée une réference pour la catégorie "costume croisé" que l'on pourra utiliser
        // dans d'autres fixtures et la catégorie est associée à la constance COSTUME_CROISE
        $this->addReference(self::COSTUME_CROISE, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Smoking");
        $categorie->setSlug("smoking");
        $categorie->setDescription("Le smoking homme est considéré comme une tenue de premier choix,
        pour se démarquer lors d'un mariage ou d'une cérémonie. 
        Smoking trois pièces noir ou col pointe. ");
        $categorie->setImageName("smoking.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->setIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        // On crée une réference pour la catégorie "costume croisé" que l'on pourra utiliser
        // dans d'autres fixtures et la catégorie est associée à la constance COSTUME_CROISE
        $this->addReference(self::SMOKING, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Costume trois pièces");
        $categorie->setSlug("costume-trois-pièces");
        $categorie->setDescription("Avec leur design élégant et leurs coupes intemporelles, 
        nos costumes 3-pièces Chic Shop sont incontournables dans tous les dressings. 
        Ils s'accompagnent le plus souvent d'accessoires tels qu'une pochette et
        une cravate assortie. Composée d'une veste, d'un gilet et d'un pantalon au style Dandy,
        cette tenue permettra de rendre classe et élégante la silhouette de celui qui la porte. ");
        $categorie->setImageName("costume-trois-pieces.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->setIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        // On crée une réference pour la catégorie "costume croisé" que l'on pourra utiliser
        // dans d'autres fixtures et la catégorie est associée à la constance COSTUME_CROISE
        $this->addReference(self::COSTUME_TROIS_PIECES, $categorie);

    }
}
