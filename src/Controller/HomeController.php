<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\EventRepository;
use App\Repository\ImageRepository;
use App\Repository\RestaurantRepository;
use App\Repository\RoomRepository;
use App\Repository\ServiceRepository;
use App\Repository\SlidelayerRepository;
use App\Repository\SlideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(RoomRepository $roomRepository, ArticleRepository $articleRepository,RestaurantRepository $restaurantRepository,ImageRepository $imageRepository, SlideRepository $slideRepository, SlidelayerRepository $slidelayerRepository,ServiceRepository $serviceRepository, EventRepository $eventRepository){
        //dd($roomRepository->findAll());
        return $this->render('home/index.html.twig',[
            'rooms'=>$roomRepository->findLatestRoomQuery(),
            'articles'=>$articleRepository->findLatestArticleQuery(),
            'restaurants'=>$restaurantRepository->findLatestMenuQuery(),
            'images'=>$imageRepository->findLatestImageQuery(),
            'slides'=>$slideRepository->findLatestSlideQuery(),
            'slidelayers'=>$slidelayerRepository->findAll(),
            'services'=>$serviceRepository->findLatestServiceQuery(),
            'events'=>$eventRepository->findLatestEventQuery(),

            'current_menu'=>'home',

        ]);
    }
}
