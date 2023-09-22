<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontCategorieController extends AbstractController
{
    /**
     * Fonction qui es appélé par u render controller dans la base et qui permet de générer un menu déroulant avac les catégories
     */
    public function renderCategorieDropDown(CategorieRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findBy(["isActive"=>true],["nom"=>"ASC"]);
        return $this->render('front_categorie/_categorie_dropdown.html.twig', [
            'categories' => $categories,
        ]);
    } 

    #[Route('/categorie/{slug}', name: 'app_front_categorie', methods: ['GET', 'POST'])]
    public function index($slug, CategorieRepository $categorieRepository, Request $request): Response
    {
        if($slug=="categories"){
            return $this->render('front_categorie/index.html.twig', [
                'categories' => $categorieRepository->findBy(["isActive"=>true],["nom"=>"ASC"])
            ]);
        }else{
            if(!is_null($request->request->get('search'))){
            $categorie = $categorieRepository->findBySearch($slug, $request->request->get('search'));
                // $categorie = $cat[0];
            }else{
                $categorie = $categorieRepository->findOneBy(["slug"=>$slug]);
            }
            return $this->render('front_categorie/show.html.twig', [
                'categorie' => $categorie,
            ]);
        }
        
    }
}
