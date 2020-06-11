<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 13/03/2020
 * Time: 01:14
 */

namespace App\Controller\Restaurants;


use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantsController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var RestaurantRepository
     */
    private $repository;

    public function __construct( RestaurantRepository $repository, EntityManagerInterface $em )
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/restaurants", name="restaurants")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function index(RestaurantRepository $restaurantRepository)
    {
//        $restaurants = $paginator->paginate(
//            $this->repository->findAllMenuQuery(),
//            $request->query->getInt('page',1),
//            10
//        );
        return $this->render('restaurants/index.html.twig',[
            'restaurants' => $restaurantRepository->findLatestMenuQuery()
        ]);

    }

    /**
     * @Route("/restaurant/{id}", name="restaurant_show", methods={"GET"})
     * @return Response
     */
    public function show(Restaurant $restaurant): Response
    {
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }
}