<?php

namespace App\Controller\Admin;

use App\Controller\BaseController;
use App\Entity\Image;
use App\Entity\Room;
use App\Entity\RoomEquipment;
use App\Form\RoomType;
use App\Repository\RoomRepository;
use App\Service\UploadImage;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class AdminRoomController
 * @package App\Controller
 * @Route("/admin/room", name="admin_room")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminRoomController extends BaseController
{

    private $uploadImage;
    private $projectDir;
    private $manager;

    public function __construct($projectDir,UploadImage $uploadImage, EntityManagerInterface $manager)
    {
        $this->uploadImage = $uploadImage;
        $this->manager = $manager;
        $this->projectDir = $projectDir;
    }

    /**
     * @Route("s", name="s")
     * @param RoomRepository $roomRepository
     * @return Response
     */
    public function index(RoomRepository $roomRepository){
        return $this->render('admin/room/index.html.twig',[
            'rooms'=>$roomRepository->findAllVisibleRoomQuery()
        ]);
    }


    private function createOrEditRoom(Room $room, Request $request, FormInterface $form, string $successMessage, bool $editMode = false)
    {
        $manager = $this->getDoctrine()->getManager();
        if($editMode){
            foreach ($room->getImages() as $image){
                $nImage = file_get_contents($this->projectDir."/public".$image->getPath());
                $data = base64_encode($nImage);
                $image->setDataURL("data:image/png;base64,".$data);
            }
            $form->setData($room);
        }
        if ($this->handleForm($request, $form)) {
            if($editMode){
                $images = $manager->getRepository(Image::class)->findBy(['room'=>$room]);
                foreach ($images as $image){
                    $image->setRoom(null);
                    $manager->persist($image);
                }
            }

            foreach ($room->getImages() as $image) {
                $image->setRoom($room);
                $this->uploadImage->persistImage($image);
            }

            foreach ($room->getEquipments() as $equipment){
                $equipment->addRoom($room);
                $manager->persist($equipment);
            }

            $manager->persist($room);
            $manager->flush();
            $this->addFlash(
                'success',
                $successMessage
            );
            return true;
        }
        return false;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/new", name="_new")
     */
    public function new(Request $request)
    {
        $room = new Room();
        $form = $this->createForm(RoomType::class, $room);

        if ($this->createOrEditRoom($room, $request, $form,"La chambre a bien été ajoutée!")) {
            return $this->redirectToRoute("app_bbr_admin_rooms");
        }

        return $this->render("admin/room/new.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @param Room $room
     * @param Request $request
     * @Route("/{room}/edit", name="_edit")
     * @return Response
     */
    public function edit(Room $room, Request $request)
    {
        $form = $this->createForm(RoomType::class, $room);

        if ($this->createOrEditRoom($room, $request, $form,"La chambre a bien été modifiée!",true)) {
            return $this->redirectToRoute("app_bbr_admin_rooms");
        }

        return $this->render("admin/room/edit.html.twig", [
            "room"=>$room,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{room}/delete", name="_delete")
     * @param Room $room
     * @param EntityManagerInterface $manager
     * @return RedirectResponse
     */
    public function delete(Room $room, EntityManagerInterface $manager){
        foreach ($room->getImages() as $image){
            $image->setRoom(null);
            $manager->persist($image);
        }
        $manager->remove($room);

        $manager->flush();

        $this->addFlash(
            'success',
            "La chambre <strong>{$room->getTitle()}</strong> a bien été supprimée !"
        );

        return $this->redirectToRoute("app_bbr_admin_rooms");
    }


    /**
     * @Route("/equipments-icons", name="_equipments_icons")
     * @return Response
     */
    public function roomEquipmentIcons(){
        return  $this->render('admin/room/room_equipment_icons.html.twig');
    }
//    /**
//     * @Route("/{id}", name="_delete", methods={"DELETE"})
//     */
//    public function delete(Request $request, Room $room): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$room->getId(), $request->request->get('_token'))) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->remove($room);
//
//            $entityManager->flush();
//
//            $this->addFlash(
//                'success',
//                "La chambre <strong>{$room->getTitle()}</strong> a bien été supprimée !"
//            );
//        }
//
//        return $this->redirectToRoute('app_bbr_admin_rooms');
//    }


}
