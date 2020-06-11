<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 23/04/2020
 * Time: 20:18
 */

namespace App\Controller\Admin;


use App\Entity\EventBooking;
use App\Repository\EventBookingRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AdminRoomController
 * @package App\Controller
 * @Route("/admin/event/booking", name="admin_event_booking")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminEventBookingController extends AbstractController
{
    /**
     *@Route("s", name="s")
     *@param EventBookingRepository $EventBookingRepository
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EventBookingRepository $EventBookingRepository)
    {
        return $this->render('admin/event_booking/index.html.twig',[
            'event_bookings'=>$EventBookingRepository->findAll()
        ]);

    }

    /**
     * @Route("/{id}", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EventBooking $EventBooking): Response
    {
        if ($this->isCsrfTokenValid('delete'.$EventBooking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($EventBooking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_event_bookings');
    }


}