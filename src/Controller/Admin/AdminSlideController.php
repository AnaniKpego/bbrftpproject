<?php

namespace App\Controller\Admin;

use App\Entity\Slide;
use App\Form\SlideType;
use App\Repository\SlideRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminSlideController
 * @package App\Controller\Admin
 * @Route("/admin/slide", name="admin_slide")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminSlideController extends AbstractController
{
    /**
     * @Route("s", name="_index", methods={"GET"})
     */
    public function index(SlideRepository $slideRepository): Response
    {
        return $this->render('admin/slide/index.html.twig', [
            'slides' => $slideRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $slide = new Slide();
        $form = $this->createForm(SlideType::class, $slide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($slide);
            $entityManager->flush();

            return $this->redirectToRoute('app_bbr_admin_slide_index');
        }

        return $this->render('admin/slide/new.html.twig', [
            'slide' => $slide,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="_show", methods={"GET"})
     */
    public function show(Slide $slide): Response
    {
        return $this->render('admin/slide/show.html.twig', [
            'slide' => $slide,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Slide $slide): Response
    {
        $form = $this->createForm(SlideType::class, $slide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_bbr_admin_slide_index');
        }

        return $this->render('admin/slide/edit.html.twig', [
            'slide' => $slide,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Slide $slide): Response
    {
        if ($this->isCsrfTokenValid('delete'.$slide->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($slide);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_slide_index');
    }
}
