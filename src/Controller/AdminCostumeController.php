<?php

namespace App\Controller;

use App\Entity\Costume;
use App\Form\CostumeType;
use App\Repository\CostumeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/costume')]
class AdminCostumeController extends AbstractController
{
    #[Route('/', name: 'app_admin_costume_index', methods: ['GET'])]
    public function index(CostumeRepository $costumeRepository): Response
    {
        return $this->render('admin_costume/index.html.twig', [
            'costumes' => $costumeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_costume_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $costume = new Costume();
        $form = $this->createForm(CostumeType::class, $costume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($costume);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_costume_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_costume/new.html.twig', [
            'costume' => $costume,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_costume_show', methods: ['GET'])]
    public function show(Costume $costume): Response
    {
        return $this->render('admin_costume/show.html.twig', [
            'costume' => $costume,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_costume_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Costume $costume, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CostumeType::class, $costume, ["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_costume_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_costume/edit.html.twig', [
            'costume' => $costume,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_costume_delete', methods: ['POST'])]
    public function delete(Request $request, Costume $costume, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$costume->getId(), $request->request->get('_token'))) {
            $entityManager->remove($costume);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_costume_index', [], Response::HTTP_SEE_OTHER);
    }
}
