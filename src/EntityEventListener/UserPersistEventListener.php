<?php
namespace App\EntityEventListener;

use App\Entity\User;

class UserPersistEventListener
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $encryptSecret;
    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct(string $encryptSecret)
    {
        $this->encryptSecret = $encryptSecret;
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function prePersist(User $user):void{
        // On déclare l'algorithme de cryptage
        $cypher = "aes-256-gcm";
        $key = $this->encryptSecret;
        // On crée une clé d'encryption spécifique à l'utilisateur
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypher));
        // On ajoute la clé (iv) à l'utilsateur
        $user->setSecretIv(base64_encode($iv)); // On encode en base64 pour pouvoir le stocker
        // en BDD parce que la clé contient des caractères spéciaux instockables dans un BDD
        // On crypte le prénom de l'utilisateur
        if(!is_null($user->getPrenom())){
            $prenom = $user->getPrenom();
            $prenomCrypte = openssl_encrypt($prenom, $cypher, $key, 0, $iv, $tag);
            $finalPrenomCrypte = base64_encode($tag.$prenomCrypte);
            $user->setPrenom($finalPrenomCrypte);
        }
        if(!is_null($user->getNom())){
            $nom = $user->getNom();
            $nomCrypte = openssl_encrypt($nom, $cypher, $key, 0, $iv, $tag);
            $finalNomCrypte = base64_encode($tag.$nomCrypte);
            $user->setNom($finalNomCrypte);
        }
    }

}