<?php

namespace App\Controller;

use App\Repository\CostumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontCostumeController extends AbstractController
{
    #[Route('/costume/{slug}', name: 'app_front_costume')]
    public function index($slug, CostumeRepository $costumeRepository): Response
    {
        return $this->render('front_costume/index.html.twig', [
            'costume' => $costumeRepository->findOneBy(["slug"=>$slug]),
        ]);
    }
}
