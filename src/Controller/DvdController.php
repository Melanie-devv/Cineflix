<?php

namespace App\Controller;

use App\Entity\Dvd;
use App\Form\Dvd1Type;
use App\Repository\DvdRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dvd')]
class DvdController extends AbstractController
{
    #[Route('/', name: 'app_dvd_index', methods: ['GET'])]
    public function index(DvdRepository $dvdRepository): Response
    {
        return $this->render('dvd/index.html.twig', [
            'dvds' => $dvdRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_dvd_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dvd = new Dvd();
        $form = $this->createForm(Dvd1Type::class, $dvd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dvd);
            $entityManager->flush();

            return $this->redirectToRoute('app_dvd_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dvd/new.html.twig', [
            'dvd' => $dvd,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dvd_show', methods: ['GET'])]
    public function show(Dvd $dvd): Response
    {
        return $this->render('dvd/show.html.twig', [
            'dvd' => $dvd,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dvd_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dvd $dvd, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Dvd1Type::class, $dvd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_dvd_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dvd/edit.html.twig', [
            'dvd' => $dvd,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dvd_delete', methods: ['POST'])]
    public function delete(Request $request, Dvd $dvd, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dvd->getId(), $request->request->get('_token'))) {
            $entityManager->remove($dvd);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dvd_index', [], Response::HTTP_SEE_OTHER);
    }
}
