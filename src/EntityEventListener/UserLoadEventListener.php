<?php
    
    namespace App\EntityEventListener;

    use App\Entity\User;

    class UserLoadEventListener
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
    public function postLoad(User $user):void{
        $key = $this->encryptSecret;
        $cypher = "aes-256-gcm";
        // On récupère la clé d'encryption spécifique à l'utilisateur
        $iv = base64_decode($user->getSecretIv());
        // On decrypte ce qui a été crypté
        if(!is_null($user->getPrenom())){
            $datas = base64_decode($user->getPrenom());
            // On récupère le tag qui a servi à crypter
            $tag = substr($datas, 0, 16);
            $prenomCrypte = substr($datas, 16);
            // On décrypte
            $prenom = openssl_decrypt($prenomCrypte, $cypher, $key, 0, $iv, $tag);
            $user->setPrenom($prenom);
        }
        if(!is_null($user->getNom())){
            $datas = base64_decode($user->getNom());
            // On récupère le tag qui a servi à crypter
            $tag = substr($datas, 0, 16);
            $nomCrypte = substr($datas, 16);
            // On décrypte
            $nom = openssl_decrypt($nomCrypte, $cypher, $key, 0, $iv, $tag);
            $user->setNom($nom);
        }
    }
}