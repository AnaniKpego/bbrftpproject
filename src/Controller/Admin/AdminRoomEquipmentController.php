<?php

namespace App\Controller\Admin;

use App\Entity\RoomEquipment;
use App\Form\RoomEquipmentType;
use App\Repository\RoomEquipmentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 * @Route("admin/room/equipment")
 * @package App\Controller\Admin
 */
class AdminRoomEquipmentController extends AbstractController
{
    /**
     * @Route("/", name="room_equipment_index", methods={"GET"})
     */
    public function index(RoomEquipmentRepository $roomEquipmentRepository): Response
    {
        return $this->render('admin/room_equipment/index.html.twig', [
            'room_equipments' => $roomEquipmentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="room_equipment_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $roomEquipment = new RoomEquipment();
        $form = $this->createForm(RoomEquipmentType::class, $roomEquipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($roomEquipment);
            $entityManager->flush();

            return $this->redirectToRoute('app_bbr_admin_room_equipment_index');
        }

        return $this->render('admin/room_equipment/new.html.twig', [
            'room_equipment' => $roomEquipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="room_equipment_show", methods={"GET"})
     */
    public function show(RoomEquipment $roomEquipment): Response
    {
        return $this->render('admin/room_equipment/show.html.twig', [
            'room_equipment' => $roomEquipment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="room_equipment_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RoomEquipment $roomEquipment): Response
    {
        $form = $this->createForm(RoomEquipmentType::class, $roomEquipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_bbr_admin_room_equipment_index');
        }

        return $this->render('admin/room_equipment/edit.html.twig', [
            'room_equipment' => $roomEquipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="room_equipment_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RoomEquipment $roomEquipment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$roomEquipment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($roomEquipment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_room_equipment_index');
    }
}
