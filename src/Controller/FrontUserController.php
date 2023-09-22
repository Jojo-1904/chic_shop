<?php

namespace App\Controller;

use App\Entity\Favori;
use App\Form\UserType;
use App\Repository\CostumeRepository;
use App\Repository\FavoriRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FrontUserController extends AbstractController
{
    #[Route('/favoris/add', methods: ['POST'])]
    public function addFavorite(Request $request, CostumeRepository $costumeRepository, EntityManagerInterface $entityManager,
    FavoriRepository $favoriRepository): JsonResponse
    {
        // On récupère l'utilsateur connecté
        $user = $this->getUser();
        // Ob récupère le costume à ajouter aux favoris
        $costume = $costumeRepository->find($request->request->get('idCostume'));
        // On fait un switch pour savoir si on ajoute ou on supprime le favori
        switch($request->request->get('action')){
            case 'add':
            // On crée un favori
            $favori = new Favori();
            $favori->setUser($user);
            $favori->setCostume($costume);
            // Om mémorise le favori
            $entityManager->persist($favori);
            break;
            case 'remove':
            // On récupère le favori
            $favori = $favoriRepository->findOneBy(['user'=>$user, 'costume'=>$costume]);
            // On supprime le favori
            $entityManager->remove($favori);
        }
        // On met en BDD
        $entityManager->flush();

        return new JsonResponse(["message"=>"ok"]);

    }

    #[Route('/user', name: 'app_front_user')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        // On récupère l'utilisateur connecté
        $user = $this->getUser();
        // On crée un formulaire de User avec le datas du user connecté et on le passe à la vue
        $form = $this->createForm(UserType::class, $user);
        // On hydrate le user avec les données du formulaire posté potentiellement
        $form->handleRequest($request);
        // On vérifie que le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
            // dd($form->getData()); // Récupérer l'instance du User mais pas les propriétés mappede false
            // dd($form->all()); // Récupérer les données (champs) du formulaire y compris les mappede fasle
            // dd($form->get('plainPassword')->getData()); // On récupère les données d'un champ en particulier les mappede false
            // dd($request->request->get('plainPassword')); // On récupère la valeur d'un champ non pas dans le fomulaire,
            // mais dans la requête. $request->request recupère les données de la requête POST pour la requête GET il faut
            // utiliser $request->query
            if(!is_null($request->request->get('plainPassword'))){
                $user->setPassword($userPasswordHasherInterface->hashPassword($user, $request->get('plainPassword')));
                $entityManagerInterface->persist($user);
            }
            $entityManagerInterface->flush();
            $this->addFlash("success", "Votre profil a bien été modifié");
            // On redirige vers la page de profil
            return $this->redirectToRoute('app_front_user');
        
        }
        return $this->render('front_user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
