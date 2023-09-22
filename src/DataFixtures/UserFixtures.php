<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $encoder; // Pour le hashage du mot de passe
    // ====================================================== //
    // ====================== CONSTRUCTEUR ================== //
    // ====================================================== //
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //


    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setNom("Andrianjohary");
        $user->setPrenom("Johnny");
        $user->setEmail("menabemenakely@yahoo.fr");
        $user->setRoles(["ROLE_USER","ROLE_ADMIN"]);
        $user->setPassword($this->encoder->hashPassword($user,"tianay"));
        $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
        $user->setNom("Test");
        $user->setPrenom("Jo");
        $user->setEmail("johnny.test@test.fr");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->encoder->hashPassword($user,"tianay"));
        $user->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['user'];
    }
}
