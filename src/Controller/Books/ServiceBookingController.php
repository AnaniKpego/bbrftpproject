<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 24/04/2020
 * Time: 17:30
 */

namespace App\Controller\Books;


use App\Controller\BaseController;
use App\Entity\Service;
use App\Entity\ServiceBooking;
use App\Entity\User;
use App\Form\ServiceBookingType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class RoomBookingController
 * @package App\Controller
 * @Route("/service/{service}", name="service_")
 * @Security("is_granted('ROLE_USER')")
 */
class ServiceBookingController extends BaseController
{


    /**
     * @Route("/book/", name="booking")
     * @param Service $service
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function new(Service $service,Request $request, EntityManagerInterface $manager, MailerInterface $mailer)
    {
      $user = $this->getUser();
      $serviceBooking = new ServiceBooking();
      $form = $this->createForm(ServiceBookingType::class, $serviceBooking);

      if($this->handleForm($request, $form)){
          $serviceBooking->setService($service);
          $serviceBooking->setBooker($user);

          $manager->persist($serviceBooking);
          $manager->flush();


          $email = new TemplatedEmail();
          $email->from("no-reply@boulaybeachresort.com")
              ->to($user->getEmail())
              ->subject("Service sur demande")
              ->htmlTemplate("email/serviceBooking.html.twig")
              ->context([
                  'user' => $user,
                  'service' => $service,
                  'serviceBooking' => $serviceBooking
              ]);
			  

          $mailer->send($email);
          return $this->redirectToRoute("app_bbr_service_booking_show",[
              "service"=>$service->getId(),
              "booking"=>$serviceBooking->getId()
          ]);
      }
        return $this->render("booking/service/new.html.twig", [
            'service'=>$service,
            'form' => $form->createView()
        ]);

    }


    /**
     * @Route("/book/{booking}/show", name="booking_show")
     * @param Service $service
     * @param ServiceBooking $booking
     * @return Response
     */
    public function show(Service $service, ServiceBooking $booking)
    {
        return $this->render("booking/service/show.html.twig", [
            'service' => $service,
            'serviceBooking' => $booking
        ]);
    }

}