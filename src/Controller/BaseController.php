<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\User;
use App\Repository\ArticleRepository;
use App\Repository\RestaurantRepository;
use App\Repository\RoomBookingRepository;
use App\Repository\RoomEquipmentRepository;
use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    protected function getRoomList(){
        return $this->getDoctrine()->getRepository(RoomRepository::class)->findAll();
    }
    protected function handleForm(Request $request, FormInterface $form)
    {
        $form->handleRequest($request);
        return $form->isSubmitted() && $form->isValid();
    }

    protected function getUsers(){
        return $this->getDoctrine()->getRepository(User::class)->findAll();
    }

    protected function getImages(){
        return $this->getDoctrine()->getRepository(Image::class)->findAll();
    }

    protected function getArticles(){
        return $this->getDoctrine()->getRepository(ArticleRepository::class)->findAll();
    }

    protected function getRestaurants(){
        return $this->getDoctrine()->getRepository(RestaurantRepository::class)->findAll();
    }

    protected function getRoomBookings(){
        return $this->getDoctrine()->getRepository(RoomBookingRepository::class)->findAll();
    }

    protected function getRoomEquipments(){
        return $this->getDoctrine()->getRepository(RoomEquipmentRepository::class)->findAll();
    }

}
