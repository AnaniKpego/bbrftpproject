<?php

namespace App\Controller\Admin;

use App\Entity\Slidelayer;
use App\Form\SlidelayerType;
use App\Repository\SlidelayerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminSlidelayerController
 * @package App\Controller\Admin
 * @Route("/admin/slidelayer", name="admin_slidelayer")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminSlidelayerController extends AbstractController
{
    /**
     * @Route("s", name="_index", methods={"GET"})
     */
    public function index(SlidelayerRepository $slidelayerRepository): Response
    {
        return $this->render('admin/slidelayer/index.html.twig', [
            'slidelayers' => $slidelayerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $slidelayer = new Slidelayer();
        $form = $this->createForm(SlidelayerType::class, $slidelayer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($slidelayer);
            $entityManager->flush();

            return $this->redirectToRoute('app_bbr_admin_slidelayer_index');
        }

        return $this->render('admin/slidelayer/new.html.twig', [
            'slidelayer' => $slidelayer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_show", methods={"GET"})
     */
    public function show(Slidelayer $slidelayer): Response
    {
        return $this->render('admin/slidelayer/show.html.twig', [
            'slidelayer' => $slidelayer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Slidelayer $slidelayer): Response
    {
        $form = $this->createForm(SlidelayerType::class, $slidelayer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_bbr_admin_slidelayer_index');
        }

        return $this->render('admin/slidelayer/edit.html.twig', [
            'slidelayer' => $slidelayer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Slidelayer $slidelayer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$slidelayer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($slidelayer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_slidelayer_index');
    }
}
