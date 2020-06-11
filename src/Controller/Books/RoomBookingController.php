<?php

namespace App\Controller\Books;

use App\Controller\BaseController;
use App\Entity\Room;
use App\Entity\RoomBooking;
use App\Form\RoomBookingType;
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
 * @Route("/room/{room}", name="room_")
 * @Security("is_granted('ROLE_USER')")
 */
class RoomBookingController extends BaseController
{

    /**
     * @Route("/book", name="booking")
     * @param Room $room
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function new(Room $room, Request $request, EntityManagerInterface $manager, MailerInterface $mailer)
    {
        $user = $this->getUser();
        $roomBooking = new RoomBooking();
        $form = $this->createForm(RoomBookingType::class, $roomBooking);

        if ($this->handleForm($request, $form)) {
            $roomBooking->setRoom($room);
            $roomBooking->setBooker($user);

            // Si les dates ne sont pas disponibles, message d'erreur
            if (!$roomBooking->isBookableDates()) {
                $this->addFlash(
                    'warning',
                    "Les dates que vous avez choisi ne peuvent être réservées : elles sont déjà prises."
                );
            } else {
                // Sinon enregistrement et redirection
                $manager->persist($roomBooking);
                $manager->flush();

                $email = new TemplatedEmail();
                $email->from("no-reply@boulaybeachresort.com")
                    ->to($user->getEmail())
                    ->subject("Réservation chambre")
                    ->htmlTemplate("email/roomBooking.html.twig")
                    ->context([
                        'user' => $user,
                        'room' => $room,
                        'roomBooking' => $roomBooking
                    ]);
                $mailer->send($email);
                return $this->redirectToRoute("app_bbr_room_booking_show",[
                    "room"=>$room->getId(),
                    "booking"=>$roomBooking->getId()
                ]);
            }
        }

        return $this->render("booking/room/new.html.twig", [
            'room'=>$room,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/{booking}/show", name="booking_show")
     * @param Room $room
     * @param RoomBooking $booking
     * @return Response
     */
    public function show(Room $room, RoomBooking $booking)
    {
        return $this->render("booking/room/show.html.twig", [
            'room' => $room,
            'roomBooking' => $booking
        ]);
    }
}
