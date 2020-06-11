<?php

namespace App\Controller\Rooms;

use App\Entity\Room;
use App\Entity\SearchData;
use App\Form\SearchDataType;
use App\Repository\EventRepository;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RoomsController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var RoomRepository
     */
    private $repository;

    public function __construct(RoomRepository $repository, EntityManagerInterface $em )
    {
        $this->repository =$repository;
        $this->em = $em;

    }

    /**
     * @Route("/rooms", name="rooms")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param RoomRepository $roomRepository
     * @param SerializerInterface $serializer
     * @return JsonResponse|Response
     */
    public function index(PaginatorInterface $paginator, Request $request, RoomRepository $roomRepository, SerializerInterface $serializer){

        $data = new SearchData();
        $data->page = $request->get('page', 1);

        $form = $this->createForm(SearchDataType::class, $data);
        $form->handleRequest($request);

        if ($request->isXmlHttpRequest()) {
            $dataFromForm = $request->request->all();
            $data->q = $dataFromForm['q'];
            $data->minWeekPrice = intval($dataFromForm['minWeekPrice']);
            $data->maxWeekPrice = intval($dataFromForm['maxWeekPrice']);
            $data->minWeekendPrice = intval($dataFromForm['minWeekendPrice']);
            $data->maxWeekendPrice = intval($dataFromForm['maxWeekendPrice']);
            $data->guestPlaceCount = intval($dataFromForm['guestPlaceCount']);
            $data->equipments = $dataFromForm['equipments'];
            $rooms = $roomRepository->findSearch($data);

            $response = $serializer->serialize($rooms, 'json', [
                'groups' => ['rooms']
            ]);

            return new JsonResponse($response);
        }

        return $this->render('rooms/index.html.twig', [
            'form' => $form->createView(),
            'minMax'=>$roomRepository->findMinMax($data),
            'rooms' => $roomRepository->findLatestRoomQueryPublished(),
            'current_menu'=>'rooms'
        ]);

//        $rooms = $paginator->paginate(
//            $this->repository->findAllVisibleRoomQuery(),
//            $request->query->getInt('page',1),
//            10
//        );

//        $data = new SearchData();
//        $data->page = $request->get('page', 1);
//
//        $form = $this->createForm(SearchDataType::class, $data);
//        $form->handleRequest($request);
//        [$min, $max] = $this->repository->findMinMax($data);
//        $rooms = $this->repository->findSearch($data);
//
//
////        dump($data);
////        dump($rooms);
//        return $this->render('rooms/index.html.twig',[
//            'form' => $form->createView(),
//            'rooms' => $rooms,
//            'min'=> $min,
//            'max'=>$max,
//            //'minMax'=> $this->repository->findMinMax($data),
//            'current_menu'=>'rooms'
//        ]);
    }

    /**
     * @Route("/room/{id}/show", name="room_show", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Room $room, EventRepository $eventRepository, RoomRepository $roomRepository): Response
    {
        return $this->render('rooms/show.html.twig', [
            'room' => $room,
            'events'=> $eventRepository->findLatestEventQueryForRoomPage(),
            'rooms' => $roomRepository->findLatestRoomSimilaryQueryPublished(),
        ]);
    }
}
