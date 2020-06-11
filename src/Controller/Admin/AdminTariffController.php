<?php

namespace App\Controller\Admin;

use App\Entity\Tariff;
use App\Form\TariffType;
use App\Repository\TariffRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AdminTariffController
 * @package App\Controller\Admin
 * @Route("/admin/tariff", name="admin_tariff")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminTariffController extends AbstractController
{
    /**
     * @Route("s", name="_index", methods={"GET"})
     */
    public function index(TariffRepository $tariffRepository): Response
    {
        return $this->render('admin/tariff/index.html.twig', [
            'tariffs' => $tariffRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tariff = new Tariff();
        $form = $this->createForm(TariffType::class, $tariff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tariff);
            $entityManager->flush();

            return $this->redirectToRoute('app_bbr_admin_tariff_index');
        }

        return $this->render('admin/tariff/new.html.twig', [
            'tariff' => $tariff,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_show", methods={"GET"})
     */
    public function show(Tariff $tariff): Response
    {
        return $this->render('admin/tariff/show.html.twig', [
            'tariff' => $tariff,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tariff $tariff): Response
    {
        $form = $this->createForm(TariffType::class, $tariff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_bbr_admin_tariff_index');
        }

        return $this->render('admin/tariff/edit.html.twig', [
            'tariff' => $tariff,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Tariff $tariff): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tariff->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tariff);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_tariff_index');
    }
}
