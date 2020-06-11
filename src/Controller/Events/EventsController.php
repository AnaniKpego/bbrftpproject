<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 12/03/2020
 * Time: 22:11
 */

namespace App\Controller\Events;


use App\Entity\Event;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AdminEventController
 * @package App\Controller\Admin
 * @Route("/event", name="event")
 */
class EventsController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private$em;
    /**
     * @var EventRepository
     */
    private $repository;

    /**
     * EventsController constructor.
     * @param EventRepository $repository
     * @param EntityManagerInterface $em
     */
    public function __construct(EventRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("s", name="_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EventRepository $eventRepository){

//        $events = $paginator->paginate(
//            $this->repository->findAllVisibleEventIndexQuery(),
//            $request->query->getInt('page',1),
//            10
//        );
        return $this->render('events/index.html.twig',[
            'events'=>$eventRepository->findLatestEventAdminQuery(),
            'current_menu'=>'events'
        ]);
    }

    /**
     * @Route("/{id}/event", name="_show", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Event $event): Response
    {
        return $this->render('events/event-details.html.twig', [
            'event' => $event,
        ]);
    }
}