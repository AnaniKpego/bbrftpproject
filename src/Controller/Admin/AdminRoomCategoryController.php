<?php

namespace App\Controller\Admin;

use App\Entity\RoomCategory;
use App\Form\RoomCategoryType;
use App\Repository\RoomCategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminRoomCategoryController
 * @package App\Controller\Admin
 * @Route("/admin/room_categorie", name="admin_room_category")
 * @Security("is_granted('ROLE_SUPER_ADMIN')")
 */
class AdminRoomCategoryController extends AbstractController
{
    /**
     * @Route("s", name="_index", methods={"GET"})
     */
    public function index(RoomCategoryRepository $roomCategoryRepository): Response
    {
        return $this->render('admin/room_category/index.html.twig', [
            'room_categories' => $roomCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $roomCategory = new RoomCategory();
        $form = $this->createForm(RoomCategoryType::class, $roomCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($roomCategory);
            $entityManager->flush();

            return $this->redirectToRoute('app_bbr_admin_room_category_index');
        }

        return $this->render('admin/room_category/new.html.twig', [
            'room_category' => $roomCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="_show", methods={"GET"})
     */
    public function show(RoomCategory $roomCategory): Response
    {
        return $this->render('admin/room_category/show.html.twig', [
            'room_category' => $roomCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RoomCategory $roomCategory): Response
    {
        $form = $this->createForm(RoomCategoryType::class, $roomCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_bbr_admin_room_category_index');
        }

        return $this->render('admin/room_category/edit.html.twig', [
            'room_category' => $roomCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RoomCategory $roomCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$roomCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($roomCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_room_category_index');
    }
}
