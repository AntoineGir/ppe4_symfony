<?php

namespace App\Controller;

use App\Entity\PhotoAvis;
use App\Form\PhotoAvisType;
use App\Repository\PhotoAvisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/photo/avis")
 */
class PhotoAvisController extends AbstractController
{
    /**
     * @Route("/", name="photo_avis_index", methods={"GET"})
     */
    public function index(PhotoAvisRepository $photoAvisRepository): Response
    {
        return $this->render('photo_avis/index.html.twig', [
            'photo_avis' => $photoAvisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="photo_avis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $photoAvi = new PhotoAvis();
        $form = $this->createForm(PhotoAvisType::class, $photoAvi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($photoAvi);
            $entityManager->flush();

            return $this->redirectToRoute('photo_avis_index');
        }

        return $this->render('photo_avis/new.html.twig', [
            'photo_avi' => $photoAvi,
            'form' => $form->createView(),
        ]);
    }

    /*
    *@Route("/newPicture", methods={"POST})
    */
    public function newPicture(Request $photo): Response
    {
        $photoAvi = new PhotoAvis();
        $photoAvi->setPhoto($photo);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($photoAvi);
        $entityManager->flush();
    }



    /**
     * @Route("/{id}", name="photo_avis_show", methods={"GET"})
     */
    public function show(PhotoAvis $photoAvi): Response
    {
        return $this->render('photo_avis/show.html.twig', [
            'photo_avi' => $photoAvi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photo_avis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PhotoAvis $photoAvi): Response
    {
        $form = $this->createForm(PhotoAvisType::class, $photoAvi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photo_avis_index');
        }

        return $this->render('photo_avis/edit.html.twig', [
            'photo_avi' => $photoAvi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photo_avis_delete", methods={"POST"})
     */
    public function delete(Request $request, PhotoAvis $photoAvi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photoAvi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photoAvi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('photo_avis_index');
    }
}
