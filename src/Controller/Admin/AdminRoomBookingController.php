<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 27/03/2020
 * Time: 19:03
 */

namespace App\Controller\Admin;


use App\Entity\RoomBooking;
use App\Repository\RoomBookingRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AdminRoomController
 * @package App\Controller
 * @Route("/admin/booking", name="admin_room_booking")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminRoomBookingController extends AbstractController
{

    /**
     *@Route("s", name="s")
     *@param RoomBookingRepository $roomBookingRepository
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function index(RoomBookingRepository $roomBookingRepository)
    {
        return $this->render('admin/room_booking/index.html.twig',[
            'room_bookings'=>$roomBookingRepository->findLatestRoomBookingQuery()
        ]);

    }

    /**
     * @Route("/{id}", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RoomBooking $roomBooking): Response
    {
        if ($this->isCsrfTokenValid('delete'.$roomBooking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($roomBooking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_room_bookings');
    }

}