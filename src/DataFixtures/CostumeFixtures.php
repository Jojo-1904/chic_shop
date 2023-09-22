<?php

namespace App\DataFixtures;

use App\Entity\Costume;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CostumeFixtures extends Fixture
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const COSTUME_CROISE_A_CARREAUX = "costume-croise-a-carreaux";
    public const COSTUME_CROISE_A_RAYURES = "costume-croise-a-rayures";
    public const COSTUME_CROISE_PRINCE_DE_GALLES = "costume-croise-prince-de-galles";
    public const COSTUME_TROIS_PIECES_ANTHRACITE_A_RAYURES_TENNIS = "costume-trois-pieces-anthracite-a-rayure-tennis";
    public const COSTUME_TROIS_PIECES_CAVIAR = "costume-trois-pieces-caviar";
    public const COSTUME_TROIS_PIECES_FAUX_UNI = "costume-trois-pieces-faux-uni";
    public const COSTUME_CROISE_ANGLAIS_FAUX_UNI = "smoking-croise-Anglais-faux-uni";
    public const SMOKING_TROIS_PIECES_COL_CHLALES = "smoking-trois-pieces-col-chales";
    public const COSTUME_TROIS_PIECES_A_LARGE_REVERS = "smoking-trois-pieces-a-large-revers";
    
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $costume = new Costume();
        $costume->setTitre("Costume croisé à carreaux");
        $costume->setSlug("costume-croise-a-carreaux");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 78% Polyester 20% Viscose 2% Élasthanne.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        TAILLE ET COUPE :
        • Veste et pantalon coupe ajustée.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs : Bleu ciel à carreaux.
        
        VESTE :
        • Col pointe.
        • Fermeture croisée à 6 boutons.
        • 3 Poches rabats.
        • 1 Poche poitrine.
        • Deux fentes. (29 cm)
        
        PANTALON :
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste
        • Pantalon");
        $costume->setPrix(189.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::COSTUME_CROISE));
        $manager->persist($costume);
        $this->addReference(self::COSTUME_CROISE_A_CARREAUX, $costume);

        $costume = new Costume();
        $costume->setTitre("Costume croisé à rayures");
        $costume->setSlug("costume-croise-a-rayures");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 71% Polyester 29% Viscose.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        TAILLE ET COUPE :
        • Veste et pantalon coupe ajustée.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs : Noir à rayures.
        
        VESTE :
        • Col pointe.
        • Fermeture croisée à 4 boutons.
        • 3 Poches rabats.
        • 1 Poche poitrine.
        • Deux fentes. (29 cm)
        
        PANTALON :
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste
        • Pantalon");
        $costume->setPrix(189.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::COSTUME_CROISE));
        $manager->persist($costume);
        $this->addReference(self::COSTUME_CROISE_A_RAYURES, $costume);

        $costume = new Costume();
        $costume->setTitre("Costume croisé prince de galles");
        $costume->setSlug("costume-croise-prince-de-galles");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 71% Polyester 29% Viscose.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        TAILLE ET COUPE :
        • Veste et pantalon coupe ajustée.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs : Noir à rayures.
        
        VESTE :
        • Col pointe.
        • Fermeture croisée à 4 boutons.
        • 3 Poches rabats.
        • 1 Poche poitrine.
        • Deux fentes. (29 cm)
        
        PANTALON :
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste
        • Pantalon");
        $costume->setPrix(189.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::COSTUME_CROISE));
        $manager->persist($costume);
        $this->addReference(self::COSTUME_CROISE_PRINCE_DE_GALLES, $costume);

        $costume = new Costume();
        $costume->setTitre("Costume trois pieces anthracite à rayure tennis");
        $costume->setSlug("costume-trois-pieces-anthracite-a-rayure-tennis");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 70% Polyester 28% Viscose 2% Élasthanne.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs :  Gris anthracite à rayure tennis.
        
        VESTE :
        • Col pointe.
        • Fermeture à double boutonnage.
        • 3 Poches rabats.
        • 1 Poche poitrine.
        • Deux fentes. (29 cm)
        
        GILET : 
        • Fermeture croisée à 6 boutons.
        • Coupe ajusté.
        
        PANTALON :
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste.
        • Gilet.
        • Pantalon.");
        $costume->setPrix(199.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::COSTUME_TROIS_PIECES));
        $manager->persist($costume);
        $this->addReference(self::COSTUME_TROIS_PIECES_ANTHRACITE_A_RAYURES_TENNIS, $costume);

        $costume = new Costume();
        $costume->setTitre("Costume trois pièces caviar");
        $costume->setSlug("costume-trois-pieces-caviar");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 80% Polyester 17% Viscose 3% Élasthanne.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs :  Bordeaux.
        
        VESTE :
        • Col cranté.
        • Fermeture à double boutonnage.
        • 3 Poches rabats.
        • 1 Poche poitrine.
        • Deux fentes. (29 cm)
        
        GILET : 
        • Fermeture droite à 5 boutons.
        • Coupe ajusté.
        
        PANTALON :
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste.
        • Gilet.
        • Pantalon.");
        $costume->setPrix(149.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::COSTUME_TROIS_PIECES));
        $manager->persist($costume);
        $this->addReference(self::COSTUME_TROIS_PIECES_CAVIAR , $costume);

        $costume = new Costume();
        $costume->setTitre("Costume trois pièces faux-uni");
        $costume->setSlug("costume-trois-pieces-faux-uni");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 70% Polyester 30% Viscose.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs : Noir faux uni.
        
        VESTE :
        • Col pointe.
        • 2 Poches à rabat.
        • 1 Poche poitrine.
        • Deux fentes. (29 cm)
        
        GILET : 
        • Fermeture droite à 5 boutons.
        • Coupe ajusté.
        
        PANTALON :
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste
        • Gilet
        • Pantalon");
        $costume->setPrix(199.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::COSTUME_TROIS_PIECES));
        $manager->persist($costume);
        $this->addReference(self::COSTUME_TROIS_PIECES_FAUX_UNI , $costume);

        $costume = new Costume();
        $costume->setTitre("Smoking croisé Anglais faux uni");
        $costume->setSlug("smoking-croise-Anglais-faux-uni");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 85% Polyester 15% Viscose.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        TAILLE ET COUPE :
        • Veste et pantalon coupe ajustée.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs : Noir / Faux uni.
        
        VESTE :
        • Col pointe.
        • Fermeture croisée à 6 boutons.
        • Revers satin.
        • 3 Poches rabats.
        • 1 Poche poitrine.
        • Deux fentes. (29 cm)
        
        PANTALON :
        • Bande en satin.
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste
        • Pantalon");
        $costume->setPrix(229.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::SMOKING));
        $manager->persist($costume);
        $this->addReference(self::COSTUME_CROISE_ANGLAIS_FAUX_UNI , $costume);
        
        $costume = new Costume();
        $costume->setTitre("Smoking trois pièces col chales");
        $costume->setSlug("smoking-trois-pieces-col-chales");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 84% Polyester 15% Viscose 1% Élasthanne.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        TAILLE ET COUPE :
        • Veste et pantalon coupe ajustée.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs :Bordeaux.
        
        VESTE :
        • Col châles.
        • Fermeture un bouton.
        • 2 Poches passepoilées.
        • 1 Poche poitrine.
        • Une fentes. (29 cm)
        
        GILET :
        • Col rond.
        • Fermeture croisée à 6 boutons.
        
        PANTALON :
        • Couleur : Noir.
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste
        • Gilet
        • Pantalon");
        $costume->setPrix(179.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::SMOKING));
        $manager->persist($costume);
        $this->addReference(self::SMOKING_TROIS_PIECES_COL_CHLALES , $costume);

        $costume = new Costume();
        $costume->setTitre("Smoking trois piéces a large revers");
        $costume->setSlug("smoking-trois-pieces-a-large-revers");
        $costume->setDescription("MATIÈRE ET ENTRETIEN :
        • Composition : 84% Polyester 15% Viscose 1% Élasthanne.
        • Conseils d’entretien : Lavage au pressing conseillé ou sinon, lavage à 30°c en machine.
        
        TAILLE ET COUPE :
        • Veste et pantalon coupe ajustée.
        
        DÉTAILS DU PRODUIT :
        • Motifs / Couleurs :Noir.
        
        VESTE :
        • Col châles.
        • Fermeture un bouton.
        • 2 Poches passepoilées.
        • 1 Poche poitrine.
        • Deux fentes. (29 cm)
        
        GILET :
        • Révère col châles
        • Fermeture croisée à 6 boutons.
        
        PANTALON :
        • Bande en satin.
        • Poches latérales.
        • Braguette zippée.
        • Fermeture par double boutonnière.
        • Passant de ceinture.
        
        CONTENU DE L'ARTICLE :
        • Veste
        • Gilet
        • Pantalon");
        $costume->setPrix(249.00);
        $costume->setIsActive("true");
        $costume->setCategorie($this->getReference(CategorieFixtures::SMOKING));
        $manager->persist($costume);
        $this->addReference(self::COSTUME_TROIS_PIECES_A_LARGE_REVERS , $costume);

        $manager->flush();
    }
}
