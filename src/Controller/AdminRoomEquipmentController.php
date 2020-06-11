<?php

namespace App\Controller;

use App\Entity\RoomEquipment;
use App\Form\RoomEquipmentType;
use App\Repository\RoomEquipmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 * @Route("admin/room/equipment", name="admin_room_equipment")
 */
class AdminRoomEquipmentController extends BaseController
{
    /**
     * @Route("s", name="_index", methods={"GET"})
     * @param RoomEquipmentRepository $roomEquipmentRepository
     * @return Response
     */
    public function index(RoomEquipmentRepository $roomEquipmentRepository): Response
    {
        return $this->render('admin/room_equipment/index.html.twig', [
            'room_equipments' => $roomEquipmentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="_new", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $roomEquipment = new RoomEquipment();
        $form = $this->createForm(RoomEquipmentType::class, $roomEquipment);

        if ($this->handleForm($request, $form)) {
            $manager->persist($roomEquipment);
            $manager->flush();

            $this->addFlash(
                'success',
                "L'équipement a bien été ajouté"
            );

            return $this->redirectToRoute('app_bbr_admin_room_equipment_index');
        }

        return $this->render('admin/room_equipment/new.html.twig', [
            'room_equipment' => $roomEquipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_show", methods={"GET"})
     * @param RoomEquipment $roomEquipment
     * @return Response
     */
    public function show(RoomEquipment $roomEquipment): Response
    {
        return $this->render('admin/room_equipment/show.html.twig', [
            'room_equipment' => $roomEquipment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="_edit", methods={"GET","POST"})
     * @param Request $request
     * @param RoomEquipment $roomEquipment
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function edit(Request $request, RoomEquipment $roomEquipment, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(RoomEquipmentType::class, $roomEquipment);

        if ($this->handleForm($request, $form)) {
            $manager->persist($roomEquipment);
            $manager->flush();

            $this->addFlash(
                'success',
                "L'équipement a bien été modifié"
            );

            return $this->redirectToRoute('app_bbr_admin_room_equipment_index');
        }

        return $this->render('admin/room_equipment/edit.html.twig', [
            'room_equipment' => $roomEquipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="_delete", methods={"DELETE"})
     * @param Request $request
     * @param RoomEquipment $roomEquipment
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(Request $request, RoomEquipment $roomEquipment, EntityManagerInterface $manager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$roomEquipment->getId(), $request->request->get('_token'))) {
            $manager->remove($roomEquipment);
            $manager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_room_equipment_index');
    }
}
