<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 24/04/2020
 * Time: 23:53
 */

namespace App\Controller\Admin;


use App\Entity\ServiceBooking;
use App\Repository\ServiceBookingRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class AdminRoomController
 * @package App\Controller
 * @Route("/admin/service/booking", name="admin_service_booking")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminServiceBookingController extends AbstractController
{
    /**
     *@Route("s", name="s")
     *@param ServiceBookingRepository $serviceBookingRepository
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ServiceBookingRepository $serviceBookingRepository)
    {
        return $this->render('admin/service_booking/index.html.twig',[
            'service_bookings'=>$serviceBookingRepository->findAll()
        ]);

    }

    /**
     * @Route("/{id}", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ServiceBooking $serviceBooking): Response
    {
        if ($this->isCsrfTokenValid('delete'.$serviceBooking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($serviceBooking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_service_bookings');
    }


}