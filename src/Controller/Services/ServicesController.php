<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 13/03/2020
 * Time: 01:33
 */

namespace App\Controller\Services;


use App\Entity\Service;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Response;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ServiceController
 * @package App\Controller
 * @Route("/service", name="service")
 */
class ServicesController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var ServiceRepository
     */
    private $repository;

    /**
     * ServicesController constructor.
     * @param ServiceRepository $repository
     * @param EntityManagerInterface $manager
     */
    public function __construct(ServiceRepository $repository, EntityManagerInterface $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }

    /**
     * @Route("s", name="_index", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ServiceRepository $serviceRepository)
    {

        return $this->render('services/index.html.twig',[
            'current_menu'=>'services',
            'services'=> $serviceRepository->findLatestAdminServiceQuery(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="_show", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Service $service)
    {
        return $this->render('services/show.html.twig',[
            'services'=>'services',
            'service'=>$service
        ]);
    }
}