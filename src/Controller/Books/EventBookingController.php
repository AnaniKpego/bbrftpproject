<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 23/04/2020
 * Time: 16:26
 */

namespace App\Controller\Books;


use App\Controller\BaseController;
use App\Entity\Event;
use App\Entity\EventBooking;
use App\Form\EventBookingType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EventBookingController
 * @package App\Controller\Books
 * @Route("/event/{event}", name="event")
 * @Security("is_granted('ROLE_USER')")
 */

class EventBookingController extends BaseController
{
    /**
     * @Route("/book", name="_booking_new")
     * @param Event $event
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function new(Event $event, Request $request, EntityManagerInterface $manager, MailerInterface $mailer)
    {
        $user = $this->getUser();
        $eventBooking = new EventBooking();
//        $form = $this->createForm(EventBookingType::class, $eventBooking);

        if ($user) {
            $eventBooking->setEvent($event);
            $eventBooking->setBooker($user);

                $manager->persist($eventBooking);
                $manager->flush();

                $email = new TemplatedEmail();
                $email->from("no-reply@boulaybeachresort.com")
                    ->to($user->getEmail())
                    ->subject("Réservation Event")
                    ->htmlTemplate("email/eventBooking.html.twig")
                    ->context([
                        'user' => $user,
                        'event' => $event,
                        'eventBooking' => $eventBooking
                    ]);
                $mailer->send($email);
                return $this->redirectToRoute("app_bbr_event_booking_show",[
                    "event"=>$event->getId(),
                    "booking"=>$eventBooking->getId()
                ]);

        }

        return $this->render("booking/event/new.html.twig", [
            'event'=>$event,
            //'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/{booking}/show", name="booking_show")
     * @param Event $event
     * @param EventBooking $booking
     * @return Response
     */
    public function show(event $event, eventBooking $booking)
    {
        return $this->render("booking/event/show.html.twig", [
            'event' => $event,
            'eventBooking' => $booking
        ]);
    }
}