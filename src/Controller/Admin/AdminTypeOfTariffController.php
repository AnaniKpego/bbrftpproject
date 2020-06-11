<?php

namespace App\Controller\Admin;

use App\Entity\TypeOfTariff;
use App\Form\TypeOfTariffType;
use App\Repository\TypeOfTariffRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminTypeOfTariffController
 * @package App\Controller\Admin
 * @Route("/admin/type-of-tariff", name="admin_type_of_tariff")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminTypeOfTariffController extends AbstractController
{
    /**
     * @Route("s", name="_index", methods={"GET"})
     */
    public function index(TypeOfTariffRepository $typeOfTariffRepository): Response
    {
        return $this->render('admin/type_of_tariff/index.html.twig', [
            'type_of_tariffs' => $typeOfTariffRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeOfTariff = new TypeOfTariff();
        $form = $this->createForm(TypeOfTariffType::class, $typeOfTariff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeOfTariff);
            $entityManager->flush();

            return $this->redirectToRoute('app_bbr_admin_type_of_tariff_index');
        }

        return $this->render('admin/type_of_tariff/new.html.twig', [
            'type_of_tariff' => $typeOfTariff,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_show", methods={"GET"})
     */
    public function show(TypeOfTariff $typeOfTariff): Response
    {
        return $this->render('admin/type_of_tariff/show.html.twig', [
            'type_of_tariff' => $typeOfTariff,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeOfTariff $typeOfTariff): Response
    {
        $form = $this->createForm(TypeOfTariffType::class, $typeOfTariff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_bbr_admin_type_of_tariff_index');
        }

        return $this->render('admin/type_of_tariff/edit.html.twig', [
            'type_of_tariff' => $typeOfTariff,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeOfTariff $typeOfTariff): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeOfTariff->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeOfTariff);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_type_of_tariff_index');
    }
}
