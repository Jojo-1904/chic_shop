<?php

namespace App\Controller;

use App\Entity\Costume;
use App\Repository\CostumeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CartController extends AbstractController
{
    #[Route('/panier', name: 'app_front_panier')]
    public function index(SessionInterface $session, CostumeRepository $costumeRepository)
    {
        $panier = $session->get('panier', []);
    
    
        // On initialise des variables
        $data = [];
        $total = 0;

        foreach($panier as $id => $quantity){
            $costume = $costumeRepository->find($id);

            $data[] = [
                'costume' => $costume,
                'quantity' => $quantity
            ];
            $total += $costume->getPrix() * $quantity;
        }
    
        return $this->render('cart/index.html.twig', compact('data', 'total'));
    }

    #[Route('/add/{id}', name: 'app_front_panier_add')]
    public function add(Costume $costume, SessionInterface $session)
    {
        
        //On récupère l'id du produit
        $id = $costume->getId();
        
        // On récupère le panier existant
        $panier = $session->get('panier', []);
        
    
        $session->set('panier', $panier);
        // On ajoute le produit dans le panier s'il n'y est pas encore
        // Sinon on incrémente sa quantité
        if(empty($panier[$id])){
            $panier[$id] = 1;
        }else{
            $panier[$id]++;
        }
        
        $session->set('panier', $panier);
    
        
        //On redirige vers la page du panier
        return $this->redirectToRoute('app_front_panier');
    }

    #[Route('/remove/{id}', name: 'app_front_panier_remove')]
    public function remove(Costume $costume, SessionInterface $session)
    {
        
        //On récupère l'id du produit
        $id = $costume->getId();
        
        // On récupère le panier existant
        $panier = $session->get('panier', []);
        
        
        $session->set('panier', $panier);
        // On retire le produit dans le panier s'il n'y a qu'un exemplaire
        // Sinon on décrémente sa quantité
        if(!empty($panier[$id])){
            if($panier[$id] > 1){
            $panier[$id]--;
        }else{
            unset($panier[$id]);
        }
    }  
        $session->set('panier', $panier);
    
        
        //On redirige vers la page du panier
        return $this->redirectToRoute('app_front_panier');
    }

    #[Route('/delete/{id}', name: 'app_front_panier_delete')]
    public function delete(Costume $costume, SessionInterface $session)
    {
        //On récupère l'id du produit
        $id = $costume->getId();
        
        // On récupère le panier existant
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }
        
        $session->set('panier', $panier);

        //On redirige vers la page du panier
        return $this->redirectToRoute('app_front_panier');
    }

    #[Route('/panier/empty', name: 'app_front_panier_empty')]
    public function empty( SessionInterface $session)
    {
        $session->remove('panier');
        //On redirige vers la page du panier
        return $this->redirectToRoute('app_front_panier');
    }
}